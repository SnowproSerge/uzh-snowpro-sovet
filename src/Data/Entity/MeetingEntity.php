<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;


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
    public $Sovet;
    /** @var int Unix timestamp */
    public $datesov;
    /** @var string */
    public $title;

    public function getId():int
    {
        return $this->idMeeting;
    }

    public function setId($id): void
    {
        $this->idMeeting = $id;
    }
}