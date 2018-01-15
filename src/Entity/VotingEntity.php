<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Entity;

/**
 * Сущность голосование
 *
 * Class VotingEntity
 * @package Uzh\Snowpro\Entity
 */
class VotingEntity
{
    /** @var int */
    public $idVoting;
    /** @var int */
    public $idQuest;
    /** @var int */
    public $idMember;
    /** @var int */
    public $vote;
}