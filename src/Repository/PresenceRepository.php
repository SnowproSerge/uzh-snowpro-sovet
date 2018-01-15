<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\AbstractRepository;

/**
 * Сущность присутствие на собрании
 *
 * Class PresenceRepository
 * @package Uzh\Snowpro\Repository
 */
class PresenceRepository extends AbstractRepository
{
    /** @var int */
    public $idPresence;
    /** @var int */
    public $idMeeting;
    /** @var int */
    public $idMember;
    /** @var int */
    public $idInstr;

    public function getEntity(): AbstractEntity
    {
        // TODO: Implement getEntity() method.
    }

    public function getEntityORM(): AbstractEntity
    {
        // TODO: Implement getEntityORM() method.
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
}