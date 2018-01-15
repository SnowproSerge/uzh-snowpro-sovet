<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Entity;

/**
 * Сущность вопрос
 *
 * Class QuestEntity
 * @package Uzh\Snowpro\Entity
 */
class QuestEntity
{
public $idPresence;
    /** @var int */
    public $idQuest;
    /** @var int */
    public $idMeeting;
    /** @var int */
    public $flVote;
    /** @var string */
    public $title;
    /** @var string */
    public $resum;
    /** @var string */
    public $descr;
    /** @var string */
    public $verdict;
    /** @var int */
    public $idTema;
}