<?php
namespace CleanPhp\Invoicer\Domain\Entity;

/**
 * Description of AbstractEntity
 *
 * @author theAdmin
 */
abstract class AbstractEntity 
{
    protected $id;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
