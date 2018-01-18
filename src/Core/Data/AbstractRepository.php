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

    /**
     * AbstractRepository constructor.
     * @param DbConnection $dbConnection
     */
    public function __construct(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    abstract public function getClassDto(): string;
    abstract public function getEntity($id): AbstractEntity;
    abstract public function save($entity): void;
    abstract public function update($entity): void;
    abstract public function delete($entity): void;
    abstract public function insert($entity): void;
}