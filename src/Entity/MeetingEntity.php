<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Entity;

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
    public $id;
    /** @var SovetEntity */
    public $Sovet;
    /** @var int Unix timestamp */
    public $datesov;
    /** @var string */
    public $title;
}