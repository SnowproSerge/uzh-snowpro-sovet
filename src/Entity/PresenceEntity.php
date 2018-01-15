<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Entity;

/**
 * Сущность присутствие на собрании
 *
 * Class PresenceEntity
 * @package Uzh\Snowpro\Entity
 */
class PresenceEntity
{
    /** @var int */
    public $idPresence;
    /** @var int */
    public $idMeeting;
    /** @var int */
    public $idMember;
    /** @var int */
    public $idInstr;
}