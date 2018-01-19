<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Data\Dto;


use Uzh\Snowpro\Core\Data\DtoInterface;

class QuestDto implements DtoInterface
{
    /** @var int */
    public $id_quest;
    /** @var int */
    public $id_meeting;
    /** @var int */
    public $fl_vote;
    /** @var string */
    public $title;
    /** @var string */
    public $resum;
    /** @var string */
    public $descr;
    /** @var string */
    public $verdict;
    /** @var int */
    public $id_tema;

    public function getId(): int
    {
        return $this->id_quest;
    }

    public function setId(int $id): void
    {
        $this->id_quest = $id;
    }
}