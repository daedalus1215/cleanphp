<?php
namespace CleanPhp\Invoicer\Persistence\Hydrator;

use Zend\Stdlib\Hydrator\HydrationInterface;

/**
 * Description of OrderHydrator
 *
 * @author theAdmin
 */
class OrderHydrator implements HydrationInterface
{
    protected $wrappedHydrator;
    protected $customerRepository;
    
    /**
     * 
     * @param \CleanPhp\Invoicer\Persistence\Hydrator\HydratorInterface $wrappedHydrator
     * @param \CleanPhp\Invoicer\Persistence\Hydrator\CustomerRepositoryInterface $customerRepository
     */
    public function __construct(HydratorInterface $wrappedHydrator, CustomerRepositoryInterface $customerRepository)
    {
        $this->wrappedHydrator = $wrappedHydrator;
        $this->customerRepository = $customerRepository;
    }
    
    public function extract($object) {}
    
    public function hydrate(array $data, $order) 
    {
        $this->wrappedHydrator->hydrate($data, $order);
        
        if (isset($data['customer_Id'])) {
            $order->setCustomer($this->customerRepository->getById($data['customer_id']));
        }
        
        return $order;
    }

}
