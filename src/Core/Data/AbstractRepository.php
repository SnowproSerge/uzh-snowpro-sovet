<?php
/**
 * @author: Sergey Naryshkin
 * @date: 15.01.2018
 */

namespace Uzh\Snowpro\Core\Data;


abstract class AbstractRepository
{

    /** @var DbConnection */
    protected $dbConnection;

    abstract public function getEntity(): AbstractEntity;
    abstract public function getEntityORM(): AbstractEntity;
    abstract public function save($entity): void;
    abstract public function update($entity): void;
    abstract public function delete($entity): void;
    abstract public function insert($entity): void;
}