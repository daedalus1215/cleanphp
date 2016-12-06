<?php
namespace CleanPhp\Invoicer\Domain\Repository;

/**
 *
 * @author theAdmin
 */
interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getUninvoicedOrders();
}
