<?php
namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\InvoiceRepositoryInterface;



/**
 * Description of InvoicesController
 *
 * @author theAdmin
 */
class InvoicesController extends \Zend\Mvc\Controller\AbstractActionController
{
    /**
     *
     * @var InvoiceRepositoryInterface 
     */
    protected $invoiceRepository;
    
    /**
     * 
     * @param InvoiceRepositoryInterface $invoices
     */
    public function __construct(InvoiceRepositoryInterface $invoices) 
    {
        $this->invoiceRepository = $invoices;
    }
    
    public function indexAction() 
    {
        $invoices = $this->invoiceRepository->getAll();
        
        return ['invoices' => $invoices];
    }
}
