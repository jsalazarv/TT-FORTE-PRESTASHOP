<?php

namespace PrestaShop\Module\CustomUserDiscounts\Repository;

use Db;
use PrestaShop\Module\CustomUserDiscounts\Entity\CustomUserDiscount;

class CustomUserDiscountRepository
{
    private $db;
    private $dbPrefix;
    private $table;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->dbPrefix = _DB_PREFIX_;
        $this->table = 'custom_user_discounts';
    }

    public function findAll($customerId = null)
    {
        $sql = 'SELECT d.*, c.firstname, c.lastname, c.email
                FROM `' . $this->dbPrefix . $this->table . '` d
                LEFT JOIN `' . $this->dbPrefix . 'customer` c ON d.id_customer = c.id_customer
                WHERE d.active = 1';

        if ($customerId !== null) {
            $sql .= ' AND d.id_customer = ' . (int)$customerId;
        }

        $sql .= ' ORDER BY d.date_add DESC';

        $results = $this->db->executeS($sql);

        if (!$results) {
            return [];
        }

        $discounts = [];
        foreach ($results as $result) {
            $discount = $this->mapToEntity($result);
            $discount->customerName = $result['firstname'] . ' ' . $result['lastname'];
            $discount->customerEmail = $result['email'];
            $discounts[] = $discount;
        }

        return $discounts;
    }

    public function findByCustomerId($customerId)
    {
        $sql = 'SELECT * FROM `' . $this->dbPrefix . $this->table . '`
                WHERE `id_customer` = ' . (int)$customerId . '
                AND `active` = 1';

        $result = $this->db->getRow($sql);

        if (!$result) {
            return null;
        }

        return $this->mapToEntity($result);
    }

    public function saveCustomerDiscount($customerId, $discountType, $discountValue)
    {
        $now = date('Y-m-d H:i:s');
        $existing = $this->findByCustomerId($customerId);

        if ($existing) {
            $sql = 'UPDATE `' . $this->dbPrefix . $this->table . '`
                    SET `discount_type` = "' . pSQL($discountType) . '",
                        `discount_value` = ' . (float)$discountValue . ',
                        `date_upd` = "' . pSQL($now) . '"
                    WHERE `id_customer` = ' . (int)$customerId;
        } else {
            $sql = 'INSERT INTO `' . $this->dbPrefix . $this->table . '`
                    (`id_customer`, `discount_type`, `discount_value`, `active`, `date_add`, `date_upd`)
                    VALUES
                    (' . (int)$customerId . ', 
                     "' . pSQL($discountType) . '",
                     ' . (float)$discountValue . ',
                     1,
                     "' . pSQL($now) . '",
                     "' . pSQL($now) . '")';
        }

        return $this->db->execute($sql);
    }

    public function delete($discountId)
    {
        $sql = 'UPDATE `' . $this->dbPrefix . $this->table . '`
                SET `active` = 0,
                    `date_upd` = "' . pSQL(date('Y-m-d H:i:s')) . '"
                WHERE `id_discount` = ' . (int)$discountId;

        return $this->db->execute($sql);
    }

    private function mapToEntity($data)
    {
        $discount = new CustomUserDiscount();
        $discount->setId($data['id_discount'])
            ->setIdCustomer($data['id_customer'])
            ->setDiscountType($data['discount_type'])
            ->setDiscountValue($data['discount_value'])
            ->setActive($data['active'])
            ->setDateAdd($data['date_add'])
            ->setDateUpd($data['date_upd']);

        return $discount;
    }
}
