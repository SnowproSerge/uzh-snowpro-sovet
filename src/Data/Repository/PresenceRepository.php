<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\PresenceDto;
use Uzh\Snowpro\Data\Entity\PresenceEntity;

/**
 * Сущность присутствие на собрании
 *
 * Class PresenceRepository
 * @package Uzh\Snowpro\Repository
 */
class PresenceRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return PresenceDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'presence';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_presence';
    }

    /** @return string */
    public function getClassEntity(): string
    {
        return PresenceEntity::class;
    }
}