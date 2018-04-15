<?php

namespace Gwo\Recruitment\Entity;

use InvalidArgumentException;

class Product
{
    public $id;
    public $unitPrice;
    public $minimumQuantity;
    
    public function __construct()
    {
        $this->setMinimumQuantity(1);
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setUnitPrice($unitPrice)
    {
        if ($unitPrice>0) {
            $this->unitPrice = $unitPrice;
        } else {
            throw new InvalidArgumentException();
        }
    }
    
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }
    
    public function setMinimumQuantity($minimumQuantity = 1)
    {
        if ($minimumQuantity>0) {
            $this->minimumQuantity = $minimumQuantity;
        } else {
            throw new InvalidArgumentException();
        }
    }
    
    public function getMinimumQuantity()
    {
        return $this->minimumQuantity;
    }
}
