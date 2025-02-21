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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

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
        $this->need_instance = 1;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Custom User Discounts');
        $this->description = $this->l('Manage personalized discounts for your customers');

        $this->ps_versions_compliancy = [
            'min' => '8.1.0',
            'max' => _PS_VERSION_
        ];

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        // Instalar la base de datos
        if (!$this->installDb()) {
            return false;
        }

        // Instalar el tab
        if (!$this->installTab()) {
            return false;
        }

        // Registrar los hooks
        if (!$this->registerHook('displayShoppingCart') ||
            !$this->registerHook('actionCartSave') ||
            !$this->registerHook('actionCustomerFormBuilderModifier') ||
            !$this->registerHook('actionAfterCreateCustomerFormHandler') ||
            !$this->registerHook('actionAfterUpdateCustomerFormHandler')) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        // Desinstalar la base de datos
        if (!$this->uninstallDb()) {
            return false;
        }

        // Desinstalar el tab
        if (!$this->uninstallTab()) {
            return false;
        }

        return true;
    }

    private function installTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = 'AdminCustomUserDiscounts';
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Descuentos Personalizados');
        }
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentCustomer');
        $tab->module = $this->name;
        $tab->icon = 'percent';
        $tab->route_name = 'admin_customuserdiscounts_list';
        
        return $tab->add();
    }

    private function uninstallTab()
    {
        $id_tab = (int)Tab::getIdFromClassName('AdminCustomUserDiscounts');
        if ($id_tab) {
            $tab = new Tab($id_tab);
            return $tab->delete();
        }
        return true;
    }

    private function installDb()
    {
        $sql = file_get_contents(dirname(__FILE__).'/sql/install.sql');
        if (!empty($sql)) {
            return Db::getInstance()->execute($sql);
        }
        return true;
    }

    private function uninstallDb()
    {
        $sql = file_get_contents(dirname(__FILE__).'/sql/uninstall.sql');
        if (!empty($sql)) {
            return Db::getInstance()->execute($sql);
        }
        return true;
    }

    public function getContent()
    {
        Tools::redirectAdmin(
            $this->context->link->getAdminLink('AdminCustomUserDiscounts')
        );
    }

    public function hookDisplayShoppingCart($params)
    {
        if (!isset($params['cart']) || !$params['cart']->id_customer) {
            return;
        }

        $customerId = (int)$params['cart']->id_customer;
        $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
        $discount = $repository->findActiveDiscountByCustomerId($customerId);

        if (!$discount) {
            return;
        }

        $this->context->smarty->assign([
            'discount' => $discount,
            'customer' => new Customer($customerId)
        ]);

        return $this->display(__FILE__, 'views/templates/hook/cart_summary_discount.tpl');
    }

    public function hookActionCartSave($params)
    {
        if (!isset($params['cart']) || !$params['cart']->id_customer) {
            return;
        }

        $cart = $params['cart'];
        $customerId = (int)$cart->id_customer;
        
        $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
        $discount = $repository->findActiveDiscountByCustomerId($customerId);

        if (!$discount) {
            return;
        }

        // Aplicar el descuento al carrito
        $this->applyDiscountToCart($cart, $discount);
    }

    public function hookActionCustomerFormBuilderModifier(array $params)
    {
        /** @var FormBuilderInterface $formBuilder */
        $formBuilder = $params['form_builder'];
        $customerId = (int) $params['id'];
        
        // Obtener el descuento activo del cliente si existe
        $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
        $activeDiscount = $repository->findActiveDiscountByCustomerId($customerId);

        // Agregar campos de descuento al formulario
        $formBuilder
            ->add('discount_type', ChoiceType::class, [
                'label' => $this->l('Tipo de Descuento'),
                'required' => false,
                'choices' => [
                    $this->l('Porcentaje') => 'percentage',
                    $this->l('Monto Fijo') => 'amount'
                ],
                'data' => $activeDiscount ? $activeDiscount['discount_type'] : null,
            ])
            ->add('discount_value', NumberType::class, [
                'label' => $this->l('Valor del Descuento'),
                'required' => false,
                'scale' => 2,
                'attr' => [
                    'min' => 0,
                    'step' => 'any'
                ],
                'data' => $activeDiscount ? $activeDiscount['discount_value'] : null,
            ]);

        if ($activeDiscount) {
            $formBuilder->add('id_custom_user_discount', HiddenType::class, [
                'data' => $activeDiscount['id_custom_user_discount']
            ]);
        }
    }

    public function hookActionAfterUpdateCustomerFormHandler(array $params)
    {
        $this->processCustomerForm($params);
    }

    public function hookActionAfterCreateCustomerFormHandler(array $params)
    {
        $this->processCustomerForm($params);
    }

    private function processCustomerForm(array $params)
    {
        $customerId = (int) $params['id'];
        $formData = $params['form_data'];
        
        if (!$customerId || empty($formData['discount_type']) || !isset($formData['discount_value'])) {
            return;
        }

        $data = [
            'id_customer' => $customerId,
            'discount_type' => $formData['discount_type'],
            'discount_value' => (float) $formData['discount_value'],
            'active' => 1
        ];

        if (!empty($formData['id_custom_user_discount'])) {
            $data['id_custom_user_discount'] = (int) $formData['id_custom_user_discount'];
        }

        $repository = $this->get('prestashop.module.customuserdiscounts.repository.discount_repository');
        $repository->save($data);
    }

    private function applyDiscountToCart($cart, $discount)
    {
        // Implementar la lógica para aplicar el descuento al carrito
        // Esto dependerá de tu lógica de negocio específica
    }
}
