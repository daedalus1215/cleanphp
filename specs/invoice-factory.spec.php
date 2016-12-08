<?php
use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;

describe('InvoiceFactory', function () {
    describe('->createFromOrder()', function(){
        it('should return an invoice object', function () {
            $order = new Order();
            $factory = new InvoiceFactory(); 
            $invoice = $factory->createFromOrder($order);
            assert($invoice instanceof \CleanPhp\Invoicer\Domain\Entity\Invoice, 'Should be an instance of Invoice');            
        });
        
        it('should set the total of the invoice', function() {
            $order = new Order();
            $order->setTotal(500);            
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);            
            expect($invoice->getTotal())->to->equal(500);
        });
        
        it('should set the date of the Invoice', function() {
            $order = new Order();
            
            $factory = new InvoiceFactory();
            
            $invoice = $factory->createFromOrder($order);
            
            expect($invoice->getInvoiceDate())->to->loosely->equal(new \DateTime());;
        });
    });    
});