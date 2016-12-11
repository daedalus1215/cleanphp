<?php
namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;




/**
 * Description of CustomerTable
 *
 * @author theAdmin
 */
class CustomerTable extends AbstractDataTable implements CustomerRepositoryInterface
{
    public function getUninvoicedOrders() 
    {
        return [];
    }
}
