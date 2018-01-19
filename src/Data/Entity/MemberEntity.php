<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:48
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;

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
    public $instr;
    /** @var string */
    public $fname;
    /** @var string */
    public $lname;
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
}