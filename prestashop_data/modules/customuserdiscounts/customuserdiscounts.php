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
        PrestaShopLogger::addLog('CustomUserDiscounts: Iniciando instalación del módulo');
        
        if (!parent::install()) {
            PrestaShopLogger::addLog('CustomUserDiscounts: Error en parent::install()');
            return false;
        }

        // Registrar hooks
        $hooks = [
            'actionAuthentication',
            'actionCustomerFormBuilderModifier',
            'renderCustomerOptionsForm',
            'actionAfterUpdateCustomerFormHandler',
            'displayAdminCustomersForm',
            'displayAdminCustomersView',
            'displayProductPriceBlock',
            'displayShoppingCartFooter',
            'displayCartPriceBlock',
            'actionCartCalculate',
            'actionCartUpdateQuantityBefore'
        ];

        foreach ($hooks as $hook) {
            if (!$this->registerHook($hook)) {
                PrestaShopLogger::addLog('CustomUserDiscounts: Error al registrar hook ' . $hook);
                return false;
            }
            PrestaShopLogger::addLog('CustomUserDiscounts: Hook registrado exitosamente: ' . $hook);
        }

        // Instalar pestaña
        if (!$this->installTab()) {
            PrestaShopLogger::addLog('CustomUserDiscounts: Error al instalar tab');
            return false;
        }

        // Crear tabla
        if (!$this->createCustomUserDiscountsTable()) {
            PrestaShopLogger::addLog('CustomUserDiscounts: Error al crear tabla');
            return false;
        }

        PrestaShopLogger::addLog('CustomUserDiscounts: Módulo instalado exitosamente');
        return true;
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

    public function hookDisplayProductPriceBlock($params)
    {
        if ($params['type'] !== 'after_price') {
            return '';
        }

        if (!$this->context->customer->isLogged()) {
            return '';
        }

        $customerId = (int) $this->context->customer->id;
        $repository = new CustomUserDiscountRepository();
        $activeDiscount = $repository->findActiveDiscountByCustomerId($customerId);

        if (!$activeDiscount) {
            return '';
        }

        try {
            $product = $params['product'];
            $originalPrice = (float) $product->price_amount;
            
            $discountAmount = 0;
            if ($activeDiscount['discount_type'] === 'percentage') {
                $discountAmount = $originalPrice * ($activeDiscount['discount_value'] / 100);
            } else {
                $discountAmount = min($activeDiscount['discount_value'], $originalPrice);
            }

            $finalPrice = max($originalPrice - $discountAmount, 0);

            $this->context->smarty->assign([
                'custom_discount' => $activeDiscount,
                'original_price' => $originalPrice,
                'discount_amount' => $discountAmount,
                'final_price' => $finalPrice,
                'currency' => $this->context->currency,
                'show_initial_price' => true
            ]);

            return $this->display(__FILE__, 'views/templates/hook/product_price_block.tpl');
        } catch (Exception $e) {
            PrestaShopLogger::addLog('CustomUserDiscounts - Error: ' . $e->getMessage(), 3);
            return '';
        }
    }

    public function hookDisplayShoppingCartFooter($params)
    {
        if (!$this->context->customer->isLogged()) {
            return '';
        }

        $customerId = (int) $this->context->customer->id;
        $repository = new CustomUserDiscountRepository();
        $activeDiscount = $repository->findActiveDiscountByCustomerId($customerId);

        if (!$activeDiscount) {
            return '';
        }

        try {
            if (!isset($params['cart'])) {
                return '';
            }

            $cart = $params['cart'];
            $products = $cart->getProducts();
            
            if (empty($products)) {
                return '';
            }

            // Calcular el total original usando el precio de cada producto
            $originalPrice = 0;
            foreach ($products as $product) {
                $price = Product::getPriceStatic(
                    (int)$product['id_product'],
                    true,
                    (int)$product['id_product_attribute'],
                    6,
                    null,
                    false,
                    true,
                    $product['cart_quantity']
                );
                $originalPrice += $price * (int)$product['cart_quantity'];
            }

            $discountAmount = 0;
            if ($activeDiscount['discount_type'] === 'percentage') {
                $discountAmount = $originalPrice * ($activeDiscount['discount_value'] / 100);
            } else {
                $discountAmount = min($activeDiscount['discount_value'], $originalPrice);
            }

            $finalPrice = max($originalPrice - $discountAmount, 0);

            $this->context->smarty->assign([
                'custom_discount' => $activeDiscount,
                'original_price' => $originalPrice,
                'discount_amount' => $discountAmount,
                'final_price' => $finalPrice,
                'currency' => $this->context->currency
            ]);

            return $this->display(__FILE__, 'views/templates/hook/shopping_cart.tpl');
        } catch (Exception $e) {
            PrestaShopLogger::addLog('CustomUserDiscounts - Error: ' . $e->getMessage(), 3);
            return '';
        }
    }

    public function hookDisplayCartPriceBlock($params)
    {
        if (!$this->context->customer->isLogged() || $params['type'] !== 'cart_summary') {
            return '';
        }

        $customerId = (int) $this->context->customer->id;
        $repository = new CustomUserDiscountRepository();
        $activeDiscount = $repository->findActiveDiscountByCustomerId($customerId);

        if (!$activeDiscount) {
            return '';
        }

        try {
            $cart = $this->context->cart;
            $products = $cart->getProducts();
            
            if (empty($products)) {
                return '';
            }

            // Calcular el total original usando el precio de cada producto
            $originalPrice = 0;
            foreach ($products as $product) {
                $price = Product::getPriceStatic(
                    (int)$product['id_product'],
                    true,
                    (int)$product['id_product_attribute'],
                    6,
                    null,
                    false,
                    true,
                    $product['cart_quantity']
                );
                $originalPrice += $price * (int)$product['cart_quantity'];
            }

            $discountAmount = 0;
            if ($activeDiscount['discount_type'] === 'percentage') {
                $discountAmount = $originalPrice * ($activeDiscount['discount_value'] / 100);
            } else {
                $discountAmount = min($activeDiscount['discount_value'], $originalPrice);
            }

            $finalPrice = max($originalPrice - $discountAmount, 0);

            $this->context->smarty->assign([
                'custom_discount' => $activeDiscount,
                'original_price' => $originalPrice,
                'discount_amount' => $discountAmount,
                'final_price' => $finalPrice,
                'currency' => $this->context->currency
            ]);

            return $this->display(__FILE__, 'views/templates/hook/shopping_cart.tpl');
        } catch (Exception $e) {
            PrestaShopLogger::addLog('CustomUserDiscounts - Error: ' . $e->getMessage(), 3);
            return '';
        }
    }

    public function hookActionCartCalculate($params)
    {
        if (!$this->context->customer->isLogged()) {
            return;
        }

        $repository = new CustomUserDiscountRepository();
        $activeDiscount = $repository->findActiveDiscountByCustomerId($this->context->customer->id);

        if (!$activeDiscount) {
            return;
        }

        $cart = $params['cart'];
        $products = $cart->getProducts();
        
        if (empty($products)) {
            return;
        }

        // Calcular el total original usando el precio de cada producto
        $originalPrice = 0;
        foreach ($products as $product) {
            $price = Product::getPriceStatic(
                (int)$product['id_product'],
                true,
                (int)$product['id_product_attribute'],
                6,
                null,
                false,
                true,
                $product['cart_quantity']
            );
            $originalPrice += $price * (int)$product['cart_quantity'];
        }

        $discountAmount = 0;
        if ($activeDiscount['discount_type'] === 'percentage') {
            $discountAmount = $originalPrice * ($activeDiscount['discount_value'] / 100);
        } else {
            $discountAmount = min($activeDiscount['discount_value'], $originalPrice);
        }

        // Aplicar el descuento al total del carrito
        if ($discountAmount > 0) {
            // Crear o actualizar la regla de carrito
            $cartRule = new CartRule();
            $cartRule->name = [
                Configuration::get('PS_LANG_DEFAULT') => $this->l('Custom User Discount')
            ];
            $cartRule->id_customer = $this->context->customer->id;
            $cartRule->date_from = date('Y-m-d H:i:s');
            $cartRule->date_to = date('Y-m-d H:i:s', strtotime('+1 day'));
            $cartRule->quantity = 1;
            $cartRule->quantity_per_user = 1;
            $cartRule->priority = 1;
            $cartRule->partial_use = 0;
            $cartRule->code = '';
            $cartRule->minimum_amount = 0;
            $cartRule->free_shipping = 0;
            $cartRule->reduction_amount = $discountAmount;
            $cartRule->reduction_tax = 1;
            $cartRule->active = 1;

            // Guardar la regla
            if (!$cartRule->add()) {
                return;
            }

            // Aplicar la regla al carrito
            $cart->addCartRule($cartRule->id);
        }
    }

    public function hookActionCartUpdateQuantityBefore($params)
    {
        // Removemos este hook ya que no debemos alterar los precios específicos
        return;
    }

    public function hookDisplayModalContent($params)
    {
        if (!$this->context->customer->isLogged()) {
            return '';
        }

        $customerId = (int) $this->context->customer->id;
        $repository = new CustomUserDiscountRepository();
        $activeDiscount = $repository->findActiveDiscountByCustomerId($customerId);

        if (!$activeDiscount) {
            return '';
        }

        try {
            // Obtener el producto del modal
            if (!isset($params['modal_content']) || !isset($params['modal_content']['product'])) {
                return '';
            }

            $productPresenter = $params['modal_content']['product'];
            
            // Obtener el precio base del producto
            $productObj = new Product((int)$productPresenter->id);
            $originalPrice = (float)$productObj->base_price;
            
            $discountAmount = 0;
            if ($activeDiscount['discount_type'] === 'percentage') {
                $discountAmount = $originalPrice * ($activeDiscount['discount_value'] / 100);
            } else {
                $discountAmount = min($activeDiscount['discount_value'], $originalPrice);
            }

            $finalPrice = max($originalPrice - $discountAmount, 0);

            $this->context->smarty->assign([
                'custom_discount' => $activeDiscount,
                'original_price' => $originalPrice,
                'discount_amount' => $discountAmount,
                'final_price' => $finalPrice,
                'currency' => $this->context->currency
            ]);

            return $this->display(__FILE__, 'views/templates/hook/modal_cart_content.tpl');
        } catch (Exception $e) {
            PrestaShopLogger::addLog('CustomUserDiscounts - Error: ' . $e->getMessage(), 3);
            return '';
        }
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
