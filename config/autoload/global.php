<?php

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Persistence\Hydrator\InvoiceHydrator;
use CleanPhp\Invoicer\Persistence\Hydrator\OrderHydrator;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\CustomerTable;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\InvoiceTable;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\OrderTable;
use CleanPhp\Invoicer\Persistence\Zend\TableGateway\TableGatewayFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

return [
    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            
            'OrderHydrator' => function ($sm) {
                return new OrderHydrator(
                    new ClassMethods(),
                    $sm->get('CustomerTable')
                );
            },

            'CustomerTable' =>  function($sm) {
                $factory = new TableGatewayFactory();
                $hydrator = new ClassMethods();

                return new CustomerTable(
                    $factory->createGateway(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $hydrator,
                        new Customer(),
                        'customers'
                    ),
                    $hydrator
                );
            },
                    
            'InvoiceHydrator' => function ($sm) {
                return new InvoiceHydrator(new ClassMethods(), $sm->get('OrderTable'));
            },
                    
            'InvoiceTable' =>  function($sm) {
                $factory = new TableGatewayFactory();
                $hydrator = $sm->get('InvoiceHydrator');

                return new InvoiceTable(
                    $factory->createGateway(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $hydrator,
                        new Invoice(),
                        'invoices'
                    ),
                    $hydrator
                );
            },
            'OrderTable' => function($sm) {
                $factory = new TableGatewayFactory();
                $hydrator = $sm->get('OrderHydrator');

                return new OrderTable(
                    $factory->createGateway(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $hydrator,
                        new Order(),
                        'orders'
                    ),
                    $hydrator
                );
            },
        ],
    ],
];
