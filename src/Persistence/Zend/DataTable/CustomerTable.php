<?php
namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;



/**
 * Description of CustomerTable
 *
 * @author theAdmin
 */
class CustomerTable extends AbstractDataTable implements OrderRepositoryInterface
{
    public function getUninvoicedOrders() 
    {
        return [];
    }
}
