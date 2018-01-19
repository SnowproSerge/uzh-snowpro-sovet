<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\VotingDto;

/**
 * Сущность голосование
 *
 * Class VotingRepository
 * @package Uzh\Snowpro\Repository
 */
class VotingRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return VotingDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'voting';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_voting';
    }
}