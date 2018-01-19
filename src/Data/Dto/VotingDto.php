<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Data\Dto;

use Uzh\Snowpro\Core\Data\DtoInterface;

class VotingDto implements DtoInterface
{
    /** @var int */
    public $id_voting;
    /** @var int */
    public $id_quest;
    /** @var int */
    public $id_member;
    /** @var int */
    public $vote;

    public function getId(): int
    {
        return $this->id_voting;
    }

    public function setId(int $id): void
    {
        $this->id_voting = $id;
    }
}