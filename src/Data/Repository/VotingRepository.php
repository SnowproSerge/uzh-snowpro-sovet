<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\DAta\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\VotingDto;
use Uzh\Snowpro\Data\Entity\VotingEntity;

/**
 * Сущность голосование
 *
 * Class VotingRepository
 * @package Uzh\Snowpro\Repository
 */
class VotingRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return VotingDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'voting';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_voting';
    }

    /**
     * @param $questId
     * @return VotingEntity[]
     */
    public function getVotingsByQuestId($questId):array
    {
        $dtos = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' WHERE id_quest = :id',
            [':id' => $questId],
            $this->getClassDto());
        return array_map(function ($dto) {
            $vote = new VotingEntity();
            $vote->init($dto);
            return $vote;
        },$dtos);
    }

    /** @return string */
    public function getClassEntity(): string
    {
        return VotingEntity::class;
    }

}