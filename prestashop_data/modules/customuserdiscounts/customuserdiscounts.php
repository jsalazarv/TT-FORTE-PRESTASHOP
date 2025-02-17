<?php

/**
 * 2025 Juan Salazar
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 */

declare(strict_types=1);

use PrestaShop\Module\CustomUserDiscounts\Repository\CustomUserDiscountRepository;
use PrestaShopBundle\Form\Admin\Type\TranslatorAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

if (!defined('_PS_VERSION_')) {
    exit;
}

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
        $this->description = $this->l('Allows administrators to assign personalized discounts to individual customers.');
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('actionAuthentication') &&
            $this->registerHook('actionCustomerFormBuilderModifier') &&
            $this->registerHook('renderCustomerOptionsForm') &&
            $this->registerHook('actionAfterUpdateCustomerFormHandler') &&
            $this->registerHook('displayAdminCustomersForm') &&
            $this->registerHook('displayAdminCustomersView') &&
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
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminCustomUserDiscounts';
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Customer Discounts');
        }
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentCustomer');
        $tab->module = $this->name;
        $tab->route_name = 'admin_customuserdiscounts_list';

        return $tab->add();
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

    public function hookActionCustomerFormBuilderModifier(array $params)
    {
        $formBuilder = $params['form_builder'];
        $customerId = (int) $params['id'];

        // Obtener el descuento activo
        $repository = new CustomUserDiscountRepository();
        $activeDiscount = $repository->findActiveDiscountByCustomerId($customerId);

        // Obtener todos los descuentos para la vista
        $discounts = $repository->findByCustomerId($customerId);

        // Agregar campos para el nuevo descuento
        $formBuilder->add('discount_type', ChoiceType::class, [
            'label' => $this->l('Discount Type'),
            'required' => false,
            'choices' => [
                $this->l('Percentage') => 'percentage',
                $this->l('Fixed Amount') => 'amount'
            ],
            'attr' => [
                'class' => 'form-control'
            ],
            'data' => $activeDiscount ? $activeDiscount['discount_type'] : null
        ]);

        $formBuilder->add('discount_value', NumberType::class, [
            'label' => $this->l('Discount Value'),
            'required' => false,
            'attr' => [
                'class' => 'form-control',
                'min' => 0,
                'step' => 'any'
            ],
            'data' => $activeDiscount ? $activeDiscount['discount_value'] : null
        ]);

        // Asignar variables para la plantilla
        $this->context->smarty->assign([
            'discounts' => $discounts,
            'customerId' => $customerId,
            'currency' => $this->context->currency
        ]);
    }

    public function hookActionAfterUpdateCustomerFormHandler(array $params)
    {
        $customerId = (int) $params['id'];
        $form = $params['form_data'];

        if (isset($form['discount_type']) && isset($form['discount_value'])) {
            $repository = new CustomUserDiscountRepository();
            $repository->saveCustomerDiscount(
                $customerId,
                $form['discount_type'],
                (float) $form['discount_value']
            );
        }
    }

    public function hookDisplayAdminCustomersForm($params)
    {
        $customerId = (int) Tools::getValue('id_customer');
        $repository = new CustomUserDiscountRepository();
        $discounts = $repository->findByCustomerId($customerId);

        $this->context->smarty->assign([
            'discounts' => $discounts,
            'customerId' => $customerId,
            'currency' => $this->context->currency
        ]);

        return $this->display(__FILE__, 'views/templates/hook/admin_customer_form.tpl');
    }

    public function hookDisplayAdminCustomersView($params)
    {
        $customerId = (int) $params['id_customer'];
        $repository = new CustomUserDiscountRepository();
        $discounts = $repository->findByCustomerId($customerId);

        $this->context->smarty->assign([
            'discounts' => $discounts,
            'customerId' => $customerId,
            'currency' => $this->context->currency,
            'link' => $this->context->link
        ]);

        return $this->display(__FILE__, 'views/templates/hook/admin_customer_view.tpl');
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

        if (
            !Tools::isSubmit('id_customer') ||
            !Tools::isSubmit('discount_type') ||
            !Tools::isSubmit('discount_value')
        ) {
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
        $sql = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'custom_user_discount` (
            `id_custom_user_discount` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `id_customer` int(10) unsigned NOT NULL,
            `discount_type` varchar(32) NOT NULL,
            `discount_value` decimal(20,6) NOT NULL,
            `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
            `date_add` datetime NOT NULL,
            `date_upd` datetime NOT NULL,
            PRIMARY KEY (`id_custom_user_discount`),
            KEY `id_customer` (`id_customer`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci';

        return Db::getInstance()->execute($sql);
    }

    private function dropCustomUserDiscountsTable()
    {
        $sql = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'custom_user_discount`';
        return Db::getInstance()->execute($sql);
    }
}
