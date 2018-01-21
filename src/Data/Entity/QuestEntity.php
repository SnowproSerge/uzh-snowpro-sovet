<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Dto\QuestDto;
use Uzh\Snowpro\Data\Repository\MeetingRepository;
use Uzh\Snowpro\DAta\Repository\VotingRepository;

/**
 * Сущность вопрос
 *
 * Class QuestEntity
 * @package Uzh\Snowpro\Entity
 */
class QuestEntity extends AbstractEntity
{
    /** @var int */
    public $idQuest;
    /** @var MeetingEntity */
    public $meeting;
    /** @var int */
    public $flVote;
    /** @var string */
    public $title;
    /** @var string */
    public $resum;
    /** @var string */
    public $descr;
    /** @var string */
    public $verdict;
    /** @var string */
    public $subject;
    /** @var VotingEntity[] */
    public $voting;

    public const SUBJECTS = [
        0 => 'Прочее',
        1 => 'О школах',
        2 => 'О финансах',
        3 => 'О рекламе',
        4 => 'Об инструкторах',
        5 => 'О директорах'
    ];
    public const CONDITION = [
        0 => 'Прочее',
        1 => 'О школах',
        2 => 'О финансах',
        3 => 'О рекламе',
        4 => 'Об инструкторах',
        5 => 'О директорах'
    ];

    /**
     * @param QuestDto $dto
     */
    public function init($dto): void
    {
        $this->idQuest = $dto->id_quest;
        $this->meeting = new MeetingEntity($dto->id_meeting);
        $this->title = $dto->title;
        $this->flVote = $dto->fl_vote;
        $this->resum = self::CONDITION[$dto->resum];
        $this->descr = $dto->descr;
        $this->subject = self::SUBJECTS[$dto->id_tema];
        $this->verdict = $dto->verdict;

        $this->voting = [];
        $this->setFill();
    }

    public function getId(): int
    {
        return $this->idQuest;
    }

    public function setId($id): void
    {
        $this->idQuest = $id;
    }

    public function setRelations()
    {
        $this->meeting = RepositoryManager::getRepository(MeetingRepository::class)->getEntity($this->meeting->getId());
        if($this->flVote) {
            $this->fillVoting();
        }
    }

    public function fillVoting(): void
    {
        /** @var VotingRepository $repo */
        $repo = RepositoryManager::getRepository(VotingRepository::class);
        $this->voting = $repo->getVotingsByQuestId($this->getId());
    }

}