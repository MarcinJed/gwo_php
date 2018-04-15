<?php

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Cart\Exception\QuantityTooLowException;

class Item
{
    public $product;
    public $quantity;
    public $totalPrice;
    
    public function __construct($product, $quantity)
    {
        if ($product) {
            if ($product->getMinimumQuantity() > $quantity) {
                throw new QuantityTooLowException();
            } else {
                $this->product = $product;
                $this->quantity = $quantity;
                $this->setTotalPrice();
            }
        }
    }
    
    public function getProduct()
    {
        return $this->product;
    }
    
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setQuantity($quantity)
    {
        if ($this->product->getMinimumQuantity() > $quantity) {
            throw new QuantityTooLowException();
        } else {
            $this->quantity = $quantity;
            $this->setTotalPrice();
        }
    }
    
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    
    public function setTotalPrice()
    {
        $this->totalPrice = ($this->quantity * $this->product->getUnitPrice());
    }
}
