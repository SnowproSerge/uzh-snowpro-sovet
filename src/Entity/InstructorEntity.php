<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;


/**
 * Сущность инструктор
 *
 * Class InstructorEntity
 * @package Uzh\Snowpro\Entity
 */
class InstructorEntity extends AbstractEntity
{
    /** @var int */
    public $idInstr;
    /** @var string */
    public $fum;
    /** @var string */
    public $name;
    /** @var string */
    public $nic;
    /** @var string */
    public $userhash;
}