<?php
namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use CleanPhp\Invoicer\Domain\Service\InputFilter\CustomerInputFilter;
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
    
    public function newOrEditAction()
    {
        $id = $this->params()->fromRoute('id');
        $customer = $id ? $this->customerRepository->getById($id) : new Customer();
        var_dump($customer);
        
        $viewModel = new ViewModel();
        
        
        if ($this->getRequest()->isPost()) {
            $this->inputFilter->setData($this->params()->fromPost());            
            
            if ($this->inputFilter->isValid()) {
                // Populate Customer object
                $this->hydrator->hydrate($this->inputFilter->getValues(), $customer);
                // Save Customer
                $this->customerRepository->begin()->persist($customer)->commit();                
                // Message Success
                $this->flashMessenger()->addSuccessMessage('Customer Saved');
                // Kick back to customers page.
                $this->redirect()->toUrl('/customers/edit/'.$customer->getId());
            } else {
                $this->hydrator->hydrate($this->params()->fromPost(), $customer);
                $viewModel->setVariable('errors', $this->inputFilter->getMessages());
            }
        }
            
        $viewModel->setVariable('customer', $customer);
        
        return $viewModel;
    }
}
