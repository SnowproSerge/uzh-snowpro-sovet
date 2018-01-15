<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;

/**
 * Сущность голосование
 *
 * Class VotingEntity
 * @package Uzh\Snowpro\Entity
 */
class VotingEntity extends AbstractEntity
{
    /** @var int */
    public $idVoting;
    /** @var QuestEntity */
    public $quest;
    /** @var MemberEntity */
    public $member;
    /** @var int */
    public $vote;

    public function isNew()
    {
        return empty($this->idVoting);
    }
}