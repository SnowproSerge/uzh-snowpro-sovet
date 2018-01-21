<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */
namespace Uzh\Snowpro\Data\Repository;

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
        return 'meeting';
    }

    public function getPrimaryKey(): string
    {
        return 'id_meeting';
    }

    /** @return string */
    public function getClassEntity(): string
    {
        return MeetingEntity::class;
    }

    /**
     * @return null|MeetingEntity
     */
    public function getLastMeeting()
    {

        $arr = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' ORDER BY '.$this->getPrimaryKey().' DESC LIMIT 1',
            [],
            $this->getClassDto());
        if(!isset($arr[0])) {
            return null;
        }
        $meeting = new MeetingEntity();
        $meeting->init($arr[0]);

        return $meeting;
    }
    /**
     * @param $sovetId
     * @return MeetingEntity[]
     */
    public function getMeetingsBySovetId($sovetId):array
    {
        $dtos = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' WHERE id_sovet = :id',
            [':id' => $sovetId],
            $this->getClassDto());
        return array_map(function ($dto) {
            $meeting = new MeetingEntity();
            $meeting->init($dto);
            return $meeting;
        },$dtos);
    }

}