<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:48
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\MemberDto;
use Uzh\Snowpro\Data\Entity\MemberEntity;

/**
 * Сущность член совета
 *
 * Class MemberRepository
 * @package Uzh\Snowpro\Repository
 */
class MemberRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return MemberDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'member';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_member';
    }

    /** @return string */
    public function getClassEntity(): string
    {
        return MemberEntity::class;
    }
}