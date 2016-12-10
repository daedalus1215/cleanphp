<?php
namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use Zend\Db\Adapter\Adapter;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Description of TableGatewayFactory
 *
 * @author theAdmin
 */
class TableGatewayFactory 
{
    public function createGateway(Adapter $dbAdapter, HydratorInterface $hydrator, $object, $table)
    {
        $resultSet = new \Zend\Db\ResultSet\HydratingResultSet($hydrator, $object);
        return new \Zend\Db\TableGateway\TableGateway($table, $dbAdapter);
    }
}
