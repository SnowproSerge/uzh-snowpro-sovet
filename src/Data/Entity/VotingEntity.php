<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Dto\VotingDto;
use Uzh\Snowpro\Repository\MeetingRepository;
use Uzh\Snowpro\Repository\QuestRepository;

/**
 * Сущность голосование
 *
 * Class VotingEntity
 * @package Uzh\Snowpro\Entity
 */
class VotingEntity extends AbstractEntity
{
    /** @var int */
    public $idVoting;
    /** @var QuestEntity */
    public $quest;
    /** @var MemberEntity */
    public $member;
    /** @var int */
    public $vote;

    public function getId(): int
    {
        return $this->idVoting;
    }

    public function setId($id): void
    {
        $this->idVoting = $id;
    }

    /**
     * @param VotingDto $dto
     */
    public function init($dto): void
    {
        $this->idVoting = $dto->id_voting;
        $this->quest = new QuestEntity($dto->id_quest);
        $this->member = new MemberEntity($dto->id_member);
        $this->vote = $dto->vote;
        $this->setFill();
    }

    public function setRelations()
    {
        RepositoryManager::getRepository(QuestRepository::class)->fillEntity($this->quest);
        RepositoryManager::getRepository(MeetingRepository::class)->fillEntity($this->member);
    }

    /**
     * @param QuestEntity $quest
     */
    public function setQuest(QuestEntity $quest)
    {
        $this->quest = $quest;
    }


}