<?php

namespace PrestaShop\Module\CustomUserDiscounts\Entity;

class CustomUserDiscount
{
    private $id;
    private $idCustomer;
    private $discountType; // 'percentage' o 'fixed'
    private $discountValue;
    private $active;
    private $dateAdd;
    private $dateUpd;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;
        return $this;
    }

    public function getDiscountType()
    {
        return $this->discountType;
    }

    public function setDiscountType($discountType)
    {
        if (!in_array($discountType, ['percentage', 'fixed'])) {
            throw new \InvalidArgumentException('Invalid discount type');
        }
        $this->discountType = $discountType;
        return $this;
    }

    public function getDiscountValue()
    {
        return $this->discountValue;
    }

    public function setDiscountValue($discountValue)
    {
        $this->discountValue = $discountValue;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;
        return $this;
    }

    public function getDateUpd()
    {
        return $this->dateUpd;
    }

    public function setDateUpd($dateUpd)
    {
        $this->dateUpd = $dateUpd;
        return $this;
    }
}
