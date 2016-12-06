<?php
namespace CleanPhp\Invoicer\Domain\Repository;

/**
 *
 * @author theAdmin
 */
interface RepositoryInterface 
{

    public function getById($id);

    public function getAll();

    public function persist($entity);

    public function begin();

    public function commit();
}
