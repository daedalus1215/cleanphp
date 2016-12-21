<?php
namespace CleanPhp\Invoicer\Domain\Service\InputFilter;

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;

/**
 * Description of CustomerInputFilter
 *
 * @author theAdmin
 */
class CustomerInputFilter extends InputFilter
{
    public function __construct() 
    {
        $name = (new Input('name'))->setRequired(true);
        $name->getValidatorChain()->attach(new \Zend\Validator\StringLength(3)); //@todo just cuz I know no other validators atm.
        
        $email = (new Input('email'))->setRequired(true);
        $email->getValidatorChain()->attach(new EmailAddress());
        
        $this->add($name);
        $this->add($email);
    }
}
