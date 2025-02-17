<?php

namespace PrestaShop\Module\CustomUserDiscounts\Repository;

use Db;
use DbQuery;

class CustomUserDiscountRepository
{
    public function findAll()
    {
        $query = new DbQuery();
        $query->select('d.*, c.firstname as customer_firstname, c.lastname as customer_lastname, c.email')
            ->from('custom_user_discount', 'd')
            ->leftJoin('customer', 'c', 'c.id_customer = d.id_customer')
            ->where('d.active = 1')
            ->orderBy('d.date_add DESC');

        $result = Db::getInstance()->executeS($query);

        if (!$result) {
            return [];
        }

        // Formatear los resultados
        return array_map(function ($row) {
            return [
                'id' => $row['id_custom_user_discount'],
                'idCustomer' => $row['id_customer'],
                'customerName' => $row['customer_firstname'] . ' ' . $row['customer_lastname'],
                'customerEmail' => $row['email'],
                'discountType' => $row['discount_type'],
                'discountValue' => $row['discount_value'],
                'dateAdd' => $row['date_add'],
                'active' => $row['active']
            ];
        }, $result);
    }

    public function findByCustomerId($customerId)
    {
        $query = new DbQuery();
        $query->select('*')
            ->from('custom_user_discount')
            ->where('id_customer = ' . (int)$customerId)
            ->where('active = 1')
            ->orderBy('date_add DESC');

        $result = Db::getInstance()->executeS($query);

        return $result ?: [];
    }

    public function findActiveDiscountByCustomerId($customerId)
    {
        $query = new DbQuery();
        $query->select('*')
            ->from('custom_user_discount')
            ->where('id_customer = ' . (int)$customerId)
            ->where('active = 1')
            ->orderBy('date_add DESC');

        $result = Db::getInstance()->executeS($query);
        
        return $result && count($result) > 0 ? $result[0] : null;
    }

    public function delete($id)
    {
        return Db::getInstance()->update(
            'custom_user_discount',
            ['active' => 0],
            'id_custom_user_discount = ' . (int)$id
        );
    }

    public function update($id, $data)
    {
        return Db::getInstance()->update(
            'custom_user_discount',
            $data,
            'id_custom_user_discount = ' . (int)$id
        );
    }

    public function saveCustomerDiscount($customerId, $discountType, $discountValue)
    {
        // Buscar si existe un descuento activo
        $existingDiscount = $this->findActiveDiscountByCustomerId($customerId);

        $data = [
            'discount_type' => pSQL($discountType),
            'discount_value' => (float)$discountValue,
            'date_upd' => date('Y-m-d H:i:s')
        ];

        if ($existingDiscount) {
            // Actualizar el descuento existente
            return Db::getInstance()->update(
                'custom_user_discount',
                $data,
                'id_custom_user_discount = ' . (int)$existingDiscount['id_custom_user_discount']
            );
        } else {
            // Crear un nuevo descuento
            $data['id_customer'] = (int)$customerId;
            $data['active'] = 1;
            $data['date_add'] = $data['date_upd'];
            return Db::getInstance()->insert('custom_user_discount', $data);
        }
    }
}
