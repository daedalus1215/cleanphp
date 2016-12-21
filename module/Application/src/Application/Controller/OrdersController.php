<?php
namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Description of OrdersController
 *
 * @author theAdmin
 */
class OrdersController extends AbstractActionController
{
    protected $orderRepository;
    
    public function __construct(
        OrderRepositoryInterface $orderRepository, 
        CustomerRepositoryInterface $customerRepository,
        OrderInputFilter $inputFilter,
        HydratorInterface $hydrator
    ){        
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
        $this->inputFilter = $inputFilter;
        $this->hydrator = $hydrator;
    }
    
    public function indexAction() 
    {
        return [
            'orders' => $this->orderRepository->getAll()
        ];
    }
    
    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        $order = $this->orderRepository->getById($id);
        
        if (!$order) {
            $this->getResponse()->setStatusCode(404);
            return null;
        }
        
        return [
            'order' => $order
        ];
    }
    
    public function newAction()
    {
        $viewModel = new ViewModel();
        $order = new Order();
        
        if ($this->getRequest()->isPost()) {
            $this->inputFilter
                    ->setData($this->params()->fromPost());
            
            if ($this->inputFilter->isValid()) {
                $order = $this->hydrator->hydrate($this->inputFilter->getValues(), $order);
            }
            
            $this->orderRepository->begin()->persist($order)->commit();
            
            $this->flashMessenger()->addSuccessMessage('Order Created');
            $this->redirect()->toUrl('/orders/view/' . $order->getId());
        } else {
            $this->hydrator->hydrate();
            //@todo: stopped here. Just going through the code and implementing from 
            //@todo: https://github.com/mrkrstphr/cleanphp-example/blob/08-managing-orders/module/Application/src/Application/Controller/OrdersController.php
        }
    }
}
