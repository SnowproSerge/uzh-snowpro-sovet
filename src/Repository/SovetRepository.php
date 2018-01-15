<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Repository;

use Uzh\Snowpro\Core\Data\AbstractEntity;
use Uzh\Snowpro\Core\Data\AbstractRepository;

/**
 * Сущность Совет
 *
 * Class SovetRepository
 * @package Uzh\Snowpro\Repository
 */
class SovetRepository extends AbstractRepository
{
    /** @var int */
    public $idSovet;
    /** @var int */
    public $dateSt;
    /** @var int */
    public $dateEn;
    /** @var string */
    public $title;
    /** @var string */
    public $digest;

    public function getEntity(): AbstractEntity
    {
        // TODO: Implement getEntity() method.
    }

    public function getEntityORM(): AbstractEntity
    {
        // TODO: Implement getEntityORM() method.
    }

    public function save($entity): void
    {
        // TODO: Implement save() method.
    }

    public function update($entity): void
    {
        // TODO: Implement update() method.
    }

    public function delete($entity): void
    {
        // TODO: Implement delete() method.
    }

    public function insert($entity): void
    {
        // TODO: Implement insert() method.
    }
}