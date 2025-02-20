<?php

/**
 * 2025 Juan Salazar
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @author    Juan Salazar
 * @copyright 2025 Juan Salazar
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

// Cargar el autoloader
require_once __DIR__ . '/vendor/autoload.php';

use PrestaShop\Module\CustomUserDiscounts\Repository\CustomUserDiscountRepository;
use PrestaShop\Module\CustomUserDiscounts\Entity\CustomUserDiscount;

class CustomUserDiscounts extends Module
{
    public function __construct()
    {
        $this->name = 'customuserdiscounts';
        $this->tab = 'pricing_promotion';
        $this->version = '1.0.0';
        $this->author = 'Juan Salazar';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '8.1.0',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Custom User Discounts');
        $this->description = $this->l('Module for managing custom discounts per user');
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('actionAuthentication') &&
            $this->registerHook('actionCustomerFormBuilderModifier') &&
            $this->registerHook('renderCustomerOptionsForm') &&
            $this->registerHook('actionAfterUpdateCustomerFormHandler') &&
            $this->installTab() &&
            $this->createCustomUserDiscountsTable();
    }

    public function uninstall()
    {
        return $this->dropCustomUserDiscountsTable() &&
            $this->uninstallTab() &&
            parent::uninstall();
    }

    private function installTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminCustomUserDiscounts');
        if (!$tabId) {
            $tab = new Tab();
            $tab->active = 1;
            $tab->class_name = 'AdminCustomUserDiscounts';
            $tab->name = array();
            foreach (Language::getLanguages(true) as $lang) {
                $tab->name[$lang['id_lang']] = $this->trans('Customer Discounts', array(), 'Modules.Customuserdiscounts.Admin', $lang['locale']);
            }
            $tab->id_parent = (int) Tab::getIdFromClassName('AdminParentCustomer');
            $tab->module = $this->name;
            $tab->route_name = 'admin_custom_user_discounts_list';
            
            return $tab->add();
        }
        
        return true;
    }

    private function uninstallTab()
    {
        $tabId = (int) Tab::getIdFromClassName('AdminCustomUserDiscounts');
        if ($tabId) {
            $tab = new Tab($tabId);
            return $tab->delete();
        }
        return true;
    }

    public function getContent()
    {
        Tools::redirectAdmin(
            $this->context->link->getAdminLink('AdminCustomUserDiscounts')
        );
    }

    public function hookDisplayHeader()
    {
        if (!$this->context->customer->isLogged()) {
            return;
        }

        // Por ahora solo registramos el hook, implementaremos la lógica después
        return;
    }

    public function hookDisplayCustomerAccount()
    {
        if (!$this->context->customer->isLogged()) {
            return;
        }

        // Por ahora solo registramos el hook, implementaremos la lógica después
        return $this->display(__FILE__, 'customer_account.tpl');
    }

    public function hookActionAuthentication()
    {
        if (!$this->context->customer->isLogged()) {
            return;
        }

        // Por ahora solo registramos el hook, implementaremos la lógica después
        return;
    }

    public function hookActionCustomerFormBuilderModifier($params)
    {
        /** @var FormBuilderInterface $formBuilder */
        $formBuilder = $params['form_builder'];
        $customerId = (int) Tools::getValue('id_customer');

        if (!$customerId) {
            return;
        }

        $repository = new CustomUserDiscountRepository();
        $discount = $repository->findByCustomerId($customerId);

        // Agregar el campo de tipo de descuento
        $formBuilder->add('discount_type', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', [
            'label' => $this->l('Discount Type'),
            'required' => false,
            'choices' => [
                $this->l('Percentage') => 'percentage',
                $this->l('Fixed Amount') => 'fixed'
            ],
            'attr' => [
                'class' => 'custom-select'
            ]
        ]);

        // Agregar el campo de valor de descuento
        $formBuilder->add('discount_value', 'Symfony\Component\Form\Extension\Core\Type\NumberType', [
            'label' => $this->l('Discount Value'),
            'required' => false,
            'attr' => [
                'class' => 'form-control',
                'min' => 0,
                'step' => 'any'
            ],
            'help' => $this->l('Enter the discount value (percentage or fixed amount)')
        ]);

        // Establecer los valores por defecto
        $params['data']['discount_type'] = $discount ? $discount->getDiscountType() : 'percentage';
        $params['data']['discount_value'] = $discount ? $discount->getDiscountValue() : 0;
    }

    public function hookActionAfterUpdateCustomerFormHandler(array $params)
    {
        $customerId = (int) $params['id'];
        
        if (!$customerId || !isset($params['form_data'])) {
            return;
        }

        $formData = $params['form_data'];
        
        if (!isset($formData['discount_type']) || !isset($formData['discount_value'])) {
            return;
        }

        try {
            $repository = new CustomUserDiscountRepository();
            $repository->saveCustomerDiscount(
                $customerId,
                $formData['discount_type'],
                (float) $formData['discount_value']
            );
        } catch (\Exception $e) {
            // Log error if needed
        }
    }

    public function hookRenderCustomerOptionsForm($params)
    {
        $customerId = (int) Tools::getValue('id_customer');
        if (!$customerId) {
            return;
        }

        $repository = new CustomUserDiscountRepository();
        $discount = $repository->findByCustomerId($customerId);
        $discountHistory = $repository->findAll($customerId);

        $this->context->smarty->assign([
            'customer_discount' => $discount,
            'discount_history' => $discountHistory,
            'customer_id' => $customerId,
            'ajax_url' => $this->context->link->getAdminLink('AdminModules', true, [], [
                'configure' => $this->name,
                'tab_module' => $this->tab,
                'module_name' => $this->name
            ]),
            'currency_sign' => $this->context->currency->sign
        ]);

        return $this->display(__FILE__, 'views/templates/hook/admin_customer_form.tpl');
    }

    public function ajaxProcessSaveCustomerDiscount()
    {
        $response = ['success' => false];

        if (!Tools::isSubmit('id_customer') || 
            !Tools::isSubmit('discount_type') || 
            !Tools::isSubmit('discount_value')) {
            $response['message'] = $this->l('Missing required fields');
            die(json_encode($response));
        }

        $customerId = (int) Tools::getValue('id_customer');
        $discountType = Tools::getValue('discount_type');
        $discountValue = (float) Tools::getValue('discount_value');

        if (!in_array($discountType, ['percentage', 'fixed'])) {
            $response['message'] = $this->l('Invalid discount type');
            die(json_encode($response));
        }

        if ($discountType === 'percentage' && ($discountValue < 0 || $discountValue > 100)) {
            $response['message'] = $this->l('Percentage discount must be between 0 and 100');
            die(json_encode($response));
        }

        if ($discountType === 'fixed' && $discountValue < 0) {
            $response['message'] = $this->l('Fixed discount cannot be negative');
            die(json_encode($response));
        }

        try {
            $repository = new CustomUserDiscountRepository();
            $repository->saveCustomerDiscount($customerId, $discountType, $discountValue);
            
            $response['success'] = true;
            $response['message'] = $this->l('Discount saved successfully');
        } catch (\Exception $e) {
            $response['message'] = $this->l('Error saving discount');
        }

        die(json_encode($response));
    }

    public function ajaxProcessDeleteDiscount()
    {
        $response = ['success' => false];
        $discountId = (int) Tools::getValue('id_discount');

        if (!$discountId) {
            $response['message'] = $this->l('Invalid discount ID');
            die(json_encode($response));
        }

        try {
            $repository = new CustomUserDiscountRepository();
            if ($repository->delete($discountId)) {
                $response['success'] = true;
            } else {
                $response['message'] = $this->l('Error deleting discount');
            }
        } catch (\Exception $e) {
            $response['message'] = $this->l('Error deleting discount');
        }

        die(json_encode($response));
    }

    private function createCustomUserDiscountsTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'custom_user_discounts` (
            `id_discount` int(11) NOT NULL AUTO_INCREMENT,
            `id_customer` int(11) NOT NULL,
            `discount_type` enum("percentage","fixed") NOT NULL DEFAULT "percentage",
            `discount_value` decimal(20,6) NOT NULL,
            `active` tinyint(1) NOT NULL DEFAULT 1,
            `date_add` datetime NOT NULL,
            `date_upd` datetime NOT NULL,
            PRIMARY KEY (`id_discount`),
            KEY `id_customer` (`id_customer`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;';

        return Db::getInstance()->execute($sql);
    }

    private function dropCustomUserDiscountsTable()
    {
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'custom_user_discounts`';
        return Db::getInstance()->execute($sql);
    }
}
