<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:49
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\QuestDto;

/**
 * Сущность вопрос
 *
 * Class QuestRepository
 * @package Uzh\Snowpro\Repository
 */
class QuestRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return QuestDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'quest';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_quest';
    }
}