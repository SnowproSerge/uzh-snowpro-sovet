<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */
namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\MeetingDto;
use Uzh\Snowpro\Data\Entity\MeetingEntity;

/**
 *
 * Сущность встреча
 * Class MeetingRepository
 * @package Uzh\Snowpro\Repository
 */
class MeetingRepository extends AbstractRepository
{

    public function getClassDto(): string
    {
        return MeetingDto::class;
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
        return MeetingEntity::class;
    }
}