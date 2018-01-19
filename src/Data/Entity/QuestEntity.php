<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Data\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;

/**
 * Сущность вопрос
 *
 * Class QuestEntity
 * @package Uzh\Snowpro\Entity
 */
class QuestEntity extends AbstractEntity
{
public $idPresence;
    /** @var int */
    public $idQuest;
    /** @var MeetingEntity */
    public $meeting;
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
    /** @var int :todo make Entity */
    public $idTema;

    public function getId(): int
    {
        return $this->idQuest;
    }

    public function setId($id): void
    {
        $this->idQuest = $id;
    }
}