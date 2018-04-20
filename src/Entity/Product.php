<?php

declare(strict_types = 1);

namespace Gwo\Recruitment\Entity;

use InvalidArgumentException;

/**
 * Klasa Product
 */
class Product
{
    public $id;
    public $unitPrice;
    public $minimumQuantity;
    
    public function __construct()
    {
        //set default minimum quantity
        $this->setMinimumQuantity(1);
    }
    
    /**
     * @param int $id
     * @return \Gwo\Recruitment\Entity\Product
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param float $unitPrice
     */
    public function setUnitPrice(float $unitPrice)
    {
        if ($unitPrice>0) {
            $this->unitPrice = $unitPrice;
        } else {
            throw new InvalidArgumentException();
        }
    }
    
    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }
    
    /**
     * @param int $minimumQuantity
     */
    public function setMinimumQuantity(int $minimumQuantity = 1)
    {
        if ($minimumQuantity>0) {
            $this->minimumQuantity = $minimumQuantity;
        } else {
            throw new InvalidArgumentException();
        }
    }
    
    /**
     * @return int
     */
    public function getMinimumQuantity()
    {
        return $this->minimumQuantity;
    }
}
