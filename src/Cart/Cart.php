<?php

namespace Gwo\Recruitment\Cart;

use Gwo\Recruitment\Cart\Item;
use OutOfBoundsException;

class Cart
{
    public $items;
    public $totalPrice;
    
    public function getItems()
    {
        return $this->items;
    }
    
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    
    public function setTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getTotalPrice();
        }
        $this->totalPrice = $totalPrice;
    }
    
    public function getItem($num)
    {
        if (empty($this->items[$num])) {
            throw new OutOfBoundsException();
        } else {
            return $this->items[$num];
        }
    }
    
    public function setQuantity($product, $quantity)
    {
        $change = false;
        if (!empty($this->items)) {
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
    
    public function addProduct($product, $quantity)
    {
        $add = false;
        if (!empty($this->items)) {
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
    
    public function removeProduct($product)
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
}
