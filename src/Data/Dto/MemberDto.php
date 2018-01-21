<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Data\Dto;


use Uzh\Snowpro\Core\Data\AbstractDto;

class MemberDto extends AbstractDto
{
    /** @var int */
    public $id_member;
    /** @var int */
    public $id_sovet;
    /** @var int */
    public $id_instr;
    /** @var string */
    public $fname;
    /** @var string */
    public $lname;
    /** @var string */
    public $programm;


    public function getId(): int
    {
        return $this->id_member;
    }

    public function setId(int $id): void
    {
        $this->id_member = $id;
    }
}