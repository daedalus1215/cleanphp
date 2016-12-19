<?php
namespace Application\Controller;

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
    
    public function __construct(OrderRepositoryInterface $orders)
    {
        $this->orderRepository = $orders;
    }
    
    public function indexAction() 
    {
        return [
            'orders' => $this->orderRepository->getAll()
        ];
    }
}
