<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Data\Entity;

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
    public $idInstructor;
    /** @var string */
    public $fum;
    /** @var string */
    public $name;
    /** @var string */
    public $nic;
    /** @var string */
    public $userhash;

    public function getId(): int
    {
        return $this->idInstructor;
    }

    public function setId($id): void
    {
        $this->idInstructor = $id;
    }
}