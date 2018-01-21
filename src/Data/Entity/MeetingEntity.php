<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Dto\MeetingDto;
use Uzh\Snowpro\Data\Repository\SovetRepository;


/**
 *
 * Сущность встреча
 * Class MeetingEntity
 * @package Uzh\Snowpro\Entity
 */
class MeetingEntity extends AbstractEntity
{
    /** @var int */
    public $idMeeting;
    /** @var SovetEntity */
    public $sovet;
    /** @var int Unix timestamp */
    public $datesov;
    /** @var string */
    public $title;
    /** @var QuestEntity[] */
    public $question;

    public function getId():int
    {
        return $this->idMeeting;
    }

    public function setId($id): void
    {
        $this->idMeeting = $id;
    }

    /**
     * @param $dto MeetingDto
     */
    public function init($dto): void
    {
        $this->idMeeting = $dto->getId();
        $this->sovet = new SovetEntity($dto->id_sovet);
        $this->datesov = $dto->datesov;
        $this->title =$dto->title;

        $this->question = [];
        $this->setFill();
    }

    public function setRelations()
    {
        RepositoryManager::getRepository(SovetRepository::class)->fillEntity($this->sovet);
    }

    /**
     * @param SovetEntity $sovet
     */
    public function setSovet(SovetEntity $sovet): void
    {
        $this->sovet = $sovet;
    }
}