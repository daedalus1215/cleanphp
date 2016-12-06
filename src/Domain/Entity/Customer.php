<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CleanPhp\Invoicer\Domain\Entity;

/**
 * Description of Customer
 *
 * @author theAdmin
 */
class Customer extends AbstractEntity 
{
    protected $name;
    protected $email;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName()
    {
        $this->name = $name;
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email) 
    {
        $this->email = $email;
        return $this;
    }
}
