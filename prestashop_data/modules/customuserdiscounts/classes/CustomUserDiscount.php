<?php
/**
 * 2025 Juan Salazar
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class CustomUserDiscount extends ObjectModel
{
    /** @var int ID del descuento */
    public $id_custom_user_discount;

    /** @var int ID del cliente */
    public $id_customer;

    /** @var string Tipo de descuento (percentage/fixed) */
    public $discount_type;

    /** @var float Valor del descuento */
    public $discount_value;

    /** @var bool Estado del descuento */
    public $active;

    /** @var string Fecha de creación */
    public $date_add;

    /** @var string Fecha de actualización */
    public $date_upd;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'custom_user_discounts',
        'primary' => 'id_custom_user_discount',
        'fields' => [
            'id_customer' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true],
            'discount_type' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'discount_value' => ['type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'required' => true],
            'active' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
            'date_add' => ['type' => self::TYPE_DATE, 'validate' => 'isDate'],
            'date_upd' => ['type' => self::TYPE_DATE, 'validate' => 'isDate']
        ]
    ];

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);
    }
}
