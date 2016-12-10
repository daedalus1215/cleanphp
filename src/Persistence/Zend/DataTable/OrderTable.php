<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

/**
 * Description of OrderTable
 *
 * @author theAdmin
 */
class OrderTable extends AbstractDataTable implements OrderRepositoryInterface
{
    public function getUninvoicedOrders() {
        
    }
}
