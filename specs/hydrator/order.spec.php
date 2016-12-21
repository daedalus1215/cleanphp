<?php

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Persistence\Hydrator\OrderHydrator;


describe('Persistence\Hydrator\OrderHydrator', function () {
    beforeEach(function () {
        $this->repository = $this->getProphet()->prophesize('CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface');
        $this->hydrator = new OrderHydrator(new \Zend\Stdlib\Hydrator\ClassMethods(), $this->repository->reveal());        
    }); 
});

describe('->hydrate()', function () {
    it('should perform basic hydration of attributes', function () {
        $data = array(
            'id' => 100,
            'order_number' => '20150101-019',
            'description' => 'simple order',
            'total' => 5000
        );
        
        $order = new Order();
        $o = $this->hydrator->hydrate($data, $order);
        expect($o->getId())->to->equal(100);
        expect($o->getOrderNumber())->to->equal('20150101-019');
        expect($o->getDescription())->to->equal('simple order');
        expect($o->getTotal())->to->equal(5000);
    });
    
//    it('should hydrate a customer entity on the Order', function () {
//        $data = [
//            'customerId' => 500
//        ];
//        
//        $customer = (new Customer())->setId(500);
//        $order = new Order();
//        
//        $this->repository->getById(500)
//                ->shouldBeCalled()
//                ->willReturn($customer);
//        
//        $this->hydrator->hydrate($data, $order);
//        
//        expect($order->getCustomer())->to->equal($customer);  
//        
//        $this->getProphet()->checkPredictions();
//    });
});