<?php

declare(strict_types = 1);

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Cart\Exception\QuantityTooLowException;
use Gwo\Recruitment\Entity\Product;

/**
 * Klasa Item
 */
class Item
{
    public $product;
    public $quantity;
    public $totalPrice;
    
    /**
     * @param Product $product Produkt
     * @param int $quantity Ilosc
     */
    public function __construct(Product $product, int $quantity)
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
    
    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
    
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    /**
     * @param int quantity
     */
    public function setQuantity(int $quantity)
    {
        if ($this->product->getMinimumQuantity() > $quantity) {
            throw new QuantityTooLowException();
        } else {
            $this->quantity = $quantity;
            $this->setTotalPrice();
        }
    }
    
    /**
     * getTotalPrice
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    
    /**
     * (quantity * price)
     */
    public function setTotalPrice()
    {
        $this->totalPrice = ($this->quantity * $this->product->getUnitPrice());
    }
}
