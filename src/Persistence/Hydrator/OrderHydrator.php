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
    
    public function hydrate(array $data, $object)
    {
        
    }

}
