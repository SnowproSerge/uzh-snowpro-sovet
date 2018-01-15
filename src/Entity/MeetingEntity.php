<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Entity;

/**
 *
 * Сущность встреча
 * Class MeetingEntity
 * @package Uzh\Snowpro\Entity
 */
class MeetingEntity
{
    /** @var int */
    public $id;
    /** @var int */
    public $idSovet;
    /** @var int Unix timestamp */
    public $datesov;
    /** @var string */
    public $title;
}