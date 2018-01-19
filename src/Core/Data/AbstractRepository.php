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

    /**
     * @return string
     */
    abstract public function getClassDto(): string;

    /**
     * @return string
     */
    abstract public function getTableName(): string;

    /**
     * @return string
     */
    abstract public function getPrimaryKey(): string;

    /**
     * @param $id
     * @return DtoInterface
     */
    public function getEntity($id): DtoInterface
    {
        $arr = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' WHERE '.$this->getPrimaryKey().' = :id',
            [':id' => $id],
            $this->getClassDto());
        return $arr[0] ?? null;
    }

    /**
     * @return DtoInterface[]
     */
    public function getAllEntities(): array
    {
        return $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName(), [], $this->getClassDto());
    }

    /**
     * @param DtoInterface $dto
     */
    public function save(DtoInterface $dto): void
    {
        if(empty($dto->getId())) {
            $this->insert($dto);
        } else {
            $this->update($dto);
        }
    }

    /**
     * @param DtoInterface $dto
     *
     * NOTE: Ограничение работы метода - в таблице не должно быть полей с именем 'id', если это поле не primary key
     */
    public function update(DtoInterface $dto): void
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
     * @param DtoInterface $dto
     */
    public function delete(DtoInterface $dto): void
    {
        $this->dbConnection->execute('DELETE FROM '.$this->getTableName().' WHERE '.$this->getPrimaryKey().'= :id',
            [':id' => $dto->getId()]);
    }

    /**
     * @param DtoInterface $dto
     * @return DtoInterface
     */
    public function insert(DtoInterface $dto): DtoInterface
    {
        $lastId = $this->dbConnection->insert($this->getTableName(),(array) $dto);
        $dto->setId($lastId);
        return $dto;
    }
}