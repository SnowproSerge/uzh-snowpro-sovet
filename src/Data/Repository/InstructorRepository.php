<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Data\Repository;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\InstructorDto;


/**
 * Сущность инструктор
 *
 * Class InstructorRepository
 * @package Uzh\Snowpro\Repository
 */
class InstructorRepository extends AbstractRepository
{
    /**
     * @param $id
     * @return AbstractEntity
     */
    public function getEntity($id): AbstractEntity
    {
        $arr = $this->dbConnection->select(
            'SELECT * FROM instr WHERE id_instr = :id',
                array(':id' => $id),
                $this->getClassDto());
        return $arr[0] ?? null;
    }

    public function getListEntities(): array
    {
        return $this->dbConnection->select(
            'SELECT * FROM instr', [], $this->getClassDto());
    }

    public function save($entity): void
    {
        // TODO: Implement save() method.
    }

    public function update($entity): void
    {
        // TODO: Implement update() method.
    }

    public function delete($entity): void
    {
        // TODO: Implement delete() method.
    }

    public function insert($entity): void
    {
        // TODO: Implement insert() method.
    }

    public function getClassDto(): string
    {
        return InstructorDto::class;
    }
}