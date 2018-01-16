<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;

/**
 * Сущность присутствие на собрании
 *
 * Class PresenceEntity
 * @package Uzh\Snowpro\Entity
 */
class PresenceEntity extends AbstractEntity
{
    /** @var int */
    public $idPresence;
    /** @var MeetingEntity */
    public $meeting;
    /** @var MemberEntity */
    public $member;
    /** @var InstructorEntity */
    public $instr;

    public function getId(): int
    {
        return $this->idPresence;
    }

    public function setId($id): void
    {
        $this->idPresence = $id;
    }
}