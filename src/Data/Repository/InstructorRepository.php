<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Data\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\InstructorDto;
use Uzh\Snowpro\Data\Entity\InstructorEntity;


/**
 * Сущность инструктор
 *
 * Class InstructorRepository
 * @package Uzh\Snowpro\Repository
 */
class InstructorRepository extends AbstractRepository
{

    public function getClassDto(): string
    {
        return InstructorDto::class;
    }

    public function getTableName(): string
    {
        return 'instr';
    }

    public function getPrimaryKey(): string
    {
        return 'id_instr';
    }

    /** @return string */
    public function getClassEntity(): string
    {
        return InstructorEntity::class;
    }
}