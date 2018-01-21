<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Dto\PresenceDto;
use Uzh\Snowpro\Data\Repository\InstructorRepository;
use Uzh\Snowpro\Data\Repository\MeetingRepository;
use Uzh\Snowpro\Data\Repository\MemberRepository;

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
    /** @var MemberEntity|null */
    public $member;
    /** @var InstructorEntity */
    public $instructor;

    public function getId(): int
    {
        return $this->idPresence;
    }

    public function setId($id): void
    {
        $this->idPresence = $id;
    }

    /**
     * @param $dto PresenceDto
     */
    public function init($dto): void
    {
        $this->idPresence = $dto->getId();
        $this->meeting = new MeetingEntity($dto->id_meeting);
        $this->member = new MemberEntity($dto->id_member);
        $this->instructor = new InstructorEntity($dto->id_instr);
        $this->setFill();
    }

    /**
     * @param MeetingEntity $meeting
     */
    public function setMeeting(MeetingEntity $meeting): void
    {
        $this->meeting = $meeting;
    }

    /**
     * @param null|MemberEntity $member
     */
    public function setMember(?MemberEntity $member): void
    {
        $this->member = $member;
    }

    /**
     * @param InstructorEntity $instructor
     */
    public function setInstructor(InstructorEntity $instructor): void
    {
        $this->instructor = $instructor;
    }

    public function setRelations()
    {
        RepositoryManager::getRepository(MemberRepository::class)->fillEntity($this->member);
        RepositoryManager::getRepository(MeetingRepository::class)->fillEntity($this->meeting);
        RepositoryManager::getRepository(InstructorRepository::class)->fillEntity($this->instructor);
    }

}