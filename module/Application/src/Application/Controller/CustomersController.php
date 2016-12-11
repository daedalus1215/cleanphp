<?php
namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Description of CustomersController
 *
 * @author theAdmin
 */
class CustomersController extends AbstractActionController
{
    public $customerRepository;
    
    public function __construct(CustomerRepositoryInterface $customer) 
    {
        $this->customerRepository = $customer;
    }
    
    public function indexAction()
    {
        return [
            'customers' => $this->customerRepository->getAll(),
        ];
    }
    
    public function newAction()
    {
        return ['1' => '1'];
    }
}
