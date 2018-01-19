<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\SovetDto;

/**
 * Сущность Совет
 *
 * Class SovetRepository
 * @package Uzh\Snowpro\Repository
 */
class SovetRepository extends AbstractRepository
{
    /**
     * @return string
     */
    public function getClassDto(): string
    {
        return SovetDto::class;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'sovet';
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return 'id_sovet';
    }
}