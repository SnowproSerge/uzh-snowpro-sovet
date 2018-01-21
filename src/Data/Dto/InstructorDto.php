<?php
/**
 * @author Sergey Naryshkin
 * Date: 19.01.2018 0:08
 */

namespace Uzh\Snowpro\Data\Dto;

use Uzh\Snowpro\Core\Data\AbstractDto;

class InstructorDto extends AbstractDto
{
    /** @var int */
    public $id_instr;
    /** @var string */
    public $fam;
    /** @var string */
    public $name;
    /** @var string */
    public $nic;
    /** @var string */
    public $userhash;

    public function getId(): int
    {
        return $this->id_instr;
    }

    public function setId(int $id): void
    {
        $this->id_instr = $id;
    }
}