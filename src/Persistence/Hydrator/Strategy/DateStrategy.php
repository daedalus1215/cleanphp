<?php
namespace CleanPhp\Invoicer\Persistence\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;
/**
 * Description of DateStrategy
 *
 * @author theAdmin
 */
class DateStrategy extends DefaultStrategy
{
    public function hydrate($value) {
        
        if (is_string($value)) {
            $value = new DateTime($value);
        }
        
        return $value;
    }
    
    
    public function extract($value) {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d');
        }
        
        return $value;
    }
    
}
