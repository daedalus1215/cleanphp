<?php
namespace CleanPhp\Invoicer\Domain\Service;


use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
/**
 * Description of InvoicingService
 *
 * @author theAdmin
 */
class InvoicingService {
    protected $orderRepository;
    protected $invoiceFactory;
    
    /**
     * 
     * @param OrderRepositoryInterface $orderRepository
     * @param \CleanPhp\Invoicer\Domain\Factory\InvoiceFactory $invoiceFactory
     */
    public function __construct(OrderRepositoryInterface $orderRepository,  $invoiceFactory) 
    {
        $this->orderRepository = $orderRepository;
        $this->invoiceFactory = $invoiceFactory;
    }
    
    public function generateInvoices()
    {
        $orders = $this->orderRepository->getUninvoicedOrders();
        
        $invoices = [];
        if (is_array($orders)) {
            foreach ($orders as $order) {
                $invoices[] = $this->invoiceFactory->createFromOrder($order);
            }            
        } else if(!empty($orders)) {
            $invoices[] = $this->invoiceFactory->createFromOrder($orders);
        }
        
        return $invoices;
    }
}
