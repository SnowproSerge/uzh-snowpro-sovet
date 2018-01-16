<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Entity;

use Uzh\Snowpro\Core\Data\AbstractEntity;

/**
 * Сущность Совет
 *
 * Class SovetEntity
 * @package Uzh\Snowpro\Entity
 */
class SovetEntity extends AbstractEntity
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

    public function getId(): int
    {
        return $this->idSovet;
    }

    public function setId($id): void
    {
        $this->idSovet = $id;
    }
}