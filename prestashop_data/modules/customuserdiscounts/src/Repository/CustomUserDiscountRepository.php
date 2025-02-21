<?php

namespace PrestaShop\Module\CustomUserDiscounts\Repository;

use Doctrine\DBAL\Connection;

class CustomUserDiscountRepository
{
    private $connection;
    private $dbPrefix;
    private $table;

    public function __construct(Connection $connection, string $dbPrefix)
    {
        $this->connection = $connection;
        $this->dbPrefix = $dbPrefix;
        $this->table = $this->dbPrefix . 'custom_user_discount';
    }

    public function findAll(): array
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->select('d.*, CONCAT(c.firstname, " ", c.lastname) as customer_name, c.email as customer_email')
           ->from($this->table, 'd')
           ->leftJoin('d', $this->dbPrefix . 'customer', 'c', 'd.id_customer = c.id_customer')
           ->orderBy('d.id_custom_user_discount', 'DESC');

        return $qb->execute()->fetchAll();
    }

    public function find(int $id): ?array
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->select('d.*, CONCAT(c.firstname, " ", c.lastname) as customer_name')
           ->from($this->table, 'd')
           ->leftJoin('d', $this->dbPrefix . 'customer', 'c', 'd.id_customer = c.id_customer')
           ->where('d.id_custom_user_discount = :id')
           ->setParameter('id', $id);

        $result = $qb->execute()->fetch();
        return $result ?: null;
    }

    public function findByCustomerId(int $customerId): array
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->select('d.*')
           ->from($this->table, 'd')
           ->where('d.id_customer = :customerId')
           ->setParameter('customerId', $customerId)
           ->orderBy('d.id_custom_user_discount', 'DESC');

        return $qb->execute()->fetchAll();
    }

    public function findActiveDiscountByCustomerId(int $customerId): ?array
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->select('d.*')
           ->from($this->table, 'd')
           ->where('d.id_customer = :customerId')
           ->andWhere('d.active = 1')
           ->setParameter('customerId', $customerId)
           ->orderBy('d.id_custom_user_discount', 'DESC')
           ->setMaxResults(1);

        $result = $qb->execute()->fetch();
        return $result ?: null;
    }

    public function save(array $data): bool
    {
        try {
            if (isset($data['id_custom_user_discount'])) {
                return $this->update($data);
            }
            return $this->insert($data);
        } catch (\Exception $e) {
            return false;
        }
    }

    private function insert(array $data): bool
    {
        $data['date_add'] = date('Y-m-d H:i:s');
        $data['date_upd'] = date('Y-m-d H:i:s');

        return (bool) $this->connection->insert($this->table, $data);
    }

    private function update(array $data): bool
    {
        $id = $data['id_custom_user_discount'];
        unset($data['id_custom_user_discount']);
        $data['date_upd'] = date('Y-m-d H:i:s');

        return (bool) $this->connection->update(
            $this->table,
            $data,
            ['id_custom_user_discount' => $id]
        );
    }

    public function delete(int $id): bool
    {
        try {
            return (bool) $this->connection->delete($this->table, ['id_custom_user_discount' => $id]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
