<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CleanPhp\Invoicer\Domain\Entity;

/**
 * Description of Order
 *
 * @author theAdmin
 */
class Order extends AbstractEntity
{
    protected $customer;
    protected $orderNumer;
    protected $description;
    protected $total;
    
    public function getCustomer()
    {
        return $this->customer;
    }
    
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }
    
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }
    
    public function setOrderNumber()
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    public function getTotal()
    {
        return $this->total;
    }
    
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }    
}
