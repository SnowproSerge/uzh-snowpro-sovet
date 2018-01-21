<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Data\Dto;


use Uzh\Snowpro\Core\Data\AbstractDto;

class PresenceDto extends AbstractDto
{
    /** @var int */
    public $id_presence;
    /** @var int */
    public $id_meeting;
    /** @var int */
    public $id_member;
    /** @var int */
    public $id_instr;

    public function getId(): int
    {
        return $this->id_presence;
    }

    public function setId(int $id): void
    {
        $this->id_presence = $id;
    }
}