<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:44
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Data\Dto\InstructorDto;


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
    public $lastName;
    /** @var string */
    public $firstName;
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

    /**
     * @param $dto InstructorDto
     */
    public function init($dto): void
    {
        $this->idInstructor = $dto->getId();
        $this->lastName = $dto->fam;
        $this->firstName = $dto->name;
        $this->nic = $dto->nic;
        $this->userhash = $dto->userhash;
        $this->setFill();
    }
}