<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:48
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Dto\MemberDto;
use Uzh\Snowpro\Data\Repository\InstructorRepository;
use Uzh\Snowpro\Repository\SovetRepository;

/**
 * Сущность член совета
 *
 * Class MemberEntity
 * @package Uzh\Snowpro\Entity
 */
class MemberEntity extends AbstractEntity
{
    /** @var int */
    public $idMember;
    /** @var SovetEntity */
    public $sovet;
    /** @var InstructorEntity */
    public $instructor;
    /** @var string */
    public $firstName;
    /** @var string */
    public $lastName;
    /** @var string */
    public $programm;

    public function getId(): int
    {
        return $this->idMember;
    }

    public function setId($id): void
    {
        $this->idMember = $id;
    }

    /**
     * @param $dto MemberDto
     */
    public function init($dto): void
    {
        $this->idMember = $dto->getId();
        $this->sovet = new SovetEntity($dto->id_sovet);
        $this->instructor = new InstructorEntity($dto->id_instr);
        $this->firstName = $dto->fname;
        $this->lastName = $dto->lname;
        $this->programm = $dto->programm;
        $this->setFill();
    }

    public function setRelations()
    {
        RepositoryManager::getRepository(SovetRepository::class)->fillEntity($this->sovet);
        RepositoryManager::getRepository(InstructorRepository::class)->fillEntity($this->instructor);
    }

    /**
     * @param SovetEntity $sovet
     */
    public function setSovet(SovetEntity $sovet): void
    {
        $this->sovet = $sovet;
    }

    /**
     * @param InstructorEntity $instructor
     */
    public function setInstructor(InstructorEntity $instructor): void
    {
        $this->instructor = $instructor;
    }

}