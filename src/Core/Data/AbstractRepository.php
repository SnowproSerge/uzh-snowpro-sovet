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

    /** @return string     */
    abstract public function getClassDto(): string;

    /** @return string     */
    abstract public function getClassEntity(): string;

    /** @return string     */
    abstract public function getTableName(): string;

    /** @return string     */
    abstract public function getPrimaryKey(): string;

    /**
     * @param $id
     * @return AbstractDto
     */
    public function getDto($id): AbstractDto
    {
        $arr = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' WHERE '.$this->getPrimaryKey().' = :id',
            [':id' => $id],
            $this->getClassDto());
        return $arr[0] ?? null;
    }

    /**
     * @param $id int
     * @return AbstractEntity
     */
    public function getEntity($id): AbstractEntity
    {
       $class = $this->getClassEntity();
       /** @var AbstractEntity $entity */
       $entity = new $class($id);
       $entity->init($this->getDto($id));
        return $entity;
    }

    /**
     * @return AbstractDto[]
     */
    public function getAllEntities(): array
    {
        return $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName(), [], $this->getClassDto());
    }

    /**
     * @param AbstractDto $dto
     */
    public function save(AbstractDto $dto): void
    {
        if(empty($dto->getId())) {
            $this->insert($dto);
        } else {
            $this->update($dto);
        }
    }

    /**
     * @param AbstractDto $dto
     *
     * NOTE: Ограничение работы метода - в таблице не должно быть полей с именем 'id', если это поле не primary key
     */
    public function update(AbstractDto $dto): void
    {
        $data = (array) $dto;
        $params = [];
        $set = [];
        foreach ($data as $key => $par) {
            if($key === $this->getPrimaryKey()) {
                continue;
            }
            $set[] = $key . '= :'.$key;
            $params[':'.$key] = $par;
        }
        $params[':id'] = $dto->getId();
        if(!\count($set)) {
            return;
        }
        $sql = 'UPDATE '.$this->getTableName().' SET '.implode(' ,',$set).' WHERE '.$this->getPrimaryKey().' = :id';
        $this->dbConnection->execute($sql,$params);
    }

    /**
     * @param AbstractDto $dto
     */
    public function delete(AbstractDto $dto): void
    {
        $this->dbConnection->execute('DELETE FROM '.$this->getTableName().' WHERE '.$this->getPrimaryKey().'= :id',
            [':id' => $dto->getId()]);
    }

    /**
     * @param AbstractDto $dto
     * @return AbstractDto
     */
    public function insert(AbstractDto $dto): AbstractDto
    {
        $lastId = $this->dbConnection->insert($this->getTableName(),(array) $dto);
        $dto->setId($lastId);
        return $dto;
    }

    /**
     * Заполняет entity, если еще не заполнено
     *
     * @param AbstractEntity $entity
     */
    public function fillEntity(AbstractEntity $entity): void
    {
        if(!$entity->isFill()) {
            $dto = $this->getDto($entity->getId());
            $entity->init($dto);
        }
    }
}