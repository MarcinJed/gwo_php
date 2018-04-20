<?php

declare(strict_types = 1);

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Cart\Item;
use Gwo\Recruitment\Entity\Product;
use OutOfBoundsException;

/**
 * Klasa Cart
 */
class Cart
{
    public $items;
    public $totalPrice;
    
    /**
     * @return Item
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Return sum of items price
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    
    /**
     * Sum of items price
     */
    public function setTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }
        $this->totalPrice = $totalPrice;
    }
    
    public function getItem(int $num)
    {
        if (empty($this->items[$num])) {
            throw new OutOfBoundsException();
        } else {
            return $this->items[$num];
        }
    }
    
    /**
     * @param Product $product
     * @param int $quantity
     */
    public function setQuantity(Product $product, int $quantity)
    {
        $change = false;
        if ($this->isNotEmptyItems()) {
            foreach ($this->items as $item) {
                if ($item->getProduct() == $product) {
                    $item->setQuantity($quantity);
                    $change = true;
                }
            }
            $this->setTotalPrice();
        }
        
        if ($change == false) {
            $this->addProduct($product, $quantity);
        }
    }
    
    /**
     * add product (change quantity if exist)
     * @param Product $product
     * @param int $quantity
     * @return \Gwo\Recruitment\Cart\Cart
     */
    public function addProduct(Product $product, int $quantity)
    {
        $add = false;
        if ($this->isNotEmptyItems()) {
            foreach ($this->items as $item) {
                if ($item->getProduct() == $product) {
                    $itemQuantity = $item->getQuantity();
                    $this->setQuantity($product, $quantity + $itemQuantity);
                    $add = true;
                }
            }
        }
        
        if ($add == false) {
            $this->items[] = new Item($product, $quantity);
            $this->setTotalPrice();
        }
        
        return $this;
    }
    
    /**
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $items = [];
        if (!empty($this->items)) {
            foreach ($this->items as $item) {
                if ($item->getProduct() != $product) {
                    $items[] = $item;
                }
            }
        }
            
        $this->items = $items;
        $this->setTotalPrice();
    }
    
    /**
     * Return true if items not empty
     * @return bool
     */
    public function isNotEmptyItems()
    {
        return !empty($this->items);
    }
}
