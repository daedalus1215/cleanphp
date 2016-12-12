<?php
namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use CleanPhp\Invoicer\Service\InputFilter\CustomerInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Description of CustomersController
 *
 * @author theAdmin
 */
class CustomersController extends AbstractActionController
{
    protected $customerRepository;
    protected $inputFilter;
    protected $hydrator;
    
    public function __construct(
        CustomerRepositoryInterface $customer, 
        CustomerInputFilter $inputFilter, 
        HydratorInterface $hydrator
    )
    {
        $this->customerRepository = $customer;
        $this->inputFilter = $inputFilter;
        $this->hydrator = $hydrator;
    }
    
    public function indexAction()
    {
        return [
            'customers' => $this->customerRepository->getAll(),
        ];
    }
    
    public function newAction()
    {
        if ($this->getRequest()->isPost()) {
            $this->inputFilter->setData($this->params()->fromPost());            
            if ($this->inputFilter->isValid()) {
                $customer = $this->hydrator->hydrate($this->inputFilter->getValues(), new Customer());
                $this->customerRepository->begin()->persist($customer)->commit();
                
                $this->flashMessenger()->addSuccessMessage('Customer Saved');
                $this->redirect()->toUrl('/customers');
            } else {
                
            }
        }
    }
}
