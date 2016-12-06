<?php
namespace CleanPhp\Invoicer\Domain\Factory;


use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;

/**
 * Description of InvoiceFactory
 *
 * @author theAdmin
 */
class InvoiceFactory 
{
    public function createFromOrder(Order $order)
    {
        return new Invoice();
    }
}
