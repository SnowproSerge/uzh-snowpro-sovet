<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Data\Repository;

use Uzh\Snowpro\Core\Data\AbstractRepository;
use Uzh\Snowpro\Data\Dto\SovetDto;
use Uzh\Snowpro\Data\Entity\SovetEntity;

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

    /** @return string */
    public function getClassEntity(): string
    {
        return SovetEntity::class;
    }

    /**
     * @return null|SovetEntity
     */
    public function getLastSovet()
    {
        $arr = $this->dbConnection->select(
            'SELECT * FROM '.$this->getTableName().' ORDER BY '.$this->getPrimaryKey().' DESC LIMIT 1',
            [],
            $this->getClassDto());
        if(!isset($arr[0])) {
            return null;
        }
        $sovet = new SovetEntity();
        $sovet->init($arr[0]);

        return $sovet;
    }
}