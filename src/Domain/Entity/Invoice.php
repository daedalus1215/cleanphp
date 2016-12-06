<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CleanPhp\Invoicer\Domain\Entity;

/**
 * Description of Invoice
 *
 * @author theAdmin
 */
class Invoice 
{
    protected $order;
    protected $invoiceDate;
    protected $total;
    
    public function getOrder()
    {
        return $this->order;
    }
    
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }
    
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }
    
    public function setInvoiceDate(\DateTime $invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
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
