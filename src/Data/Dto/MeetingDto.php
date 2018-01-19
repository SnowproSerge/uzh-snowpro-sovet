<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Data\Dto;


use Uzh\Snowpro\Core\Data\DtoInterface;

class MeetingDto implements DtoInterface
{
    /** @var int */
    public $id_meeting;
    /** @var int */
    public $id_sovet;
    /** @var int Unix timestamp */
    public $datesov;
    /** @var string */
    public $title;

    public function getId(): int
    {
        return $this->id_meeting;
    }

    public function setId(int $id): void
    {
        $this->id_meeting = $id;
    }
}