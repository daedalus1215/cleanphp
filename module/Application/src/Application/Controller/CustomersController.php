<?php
namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use CleanPhp\Invoicer\Service\InputFilter\CustomerInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\View\Model\ViewModel;

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
        $viewModel = new ViewModel();
        $customer = new Customer();
        
        if ($this->getRequest()->isPost()) {
            $this->inputFilter->setData($this->params()->fromPost());            
            
            if ($this->inputFilter->isValid()) {
                // Populate Customer object
                $customer = $this->hydrator->hydrate($this->inputFilter->getValues(), new Customer());
                // Save Customer
                $this->customerRepository->begin()->persist($customer)->commit();                
                // Message Success
                $this->flashMessenger()->addSuccessMessage('Customer Saved');
                // Kick back to customers page.
                $this->redirect()->toUrl('/customers');
            } else {
                $this->hydrator->hydrate($this->params()->fromPost(), $customer);
            }
        }
        
        $viewModel->setVariable('customer', $customer);
        
        return $viewModel;
    }
}
