<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Data\Repository;

use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\QuestDto;
use Uzh\Snowpro\Data\Entity\QuestEntity;

/**
 * Сущность вопрос
 *
 * Class QuestRepository
 * @package Uzh\Snowpro\Repository
 */
class QuestRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return QuestDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'quest';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_quest';
    }

    /** @return string */
    public function getClassEntity(): string
    {
        return QuestEntity::class;
    }

    /**
     * @param $id
     * @return QuestEntity[]
     */
    public function getQuestsByMeetingId($id): array
    {
        $dtos = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' WHERE id_meeting = :id',
            [':id' => $id],
            $this->getClassDto());
        App::logger()->addInfo('SELECT * FROM '.$this->getTableName().' WHERE id_meeting = :id',[$id,print_r($dtos,true)]);
        return array_map(function ($dto) {
            $questEntity = new QuestEntity();
            $questEntity->init($dto);
            return $questEntity;
        },$dtos);

    }
}