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
    protected $order_number;
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
    
    function getOrder_number() {
        return $this->order_number;
    }

    function setOrder_number($order_number) {
        $this->order_number = $order_number;
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
