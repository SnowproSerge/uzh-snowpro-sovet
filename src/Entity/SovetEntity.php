<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:50
 */

namespace Uzh\Snowpro\Entity;

/**
 * Сущность Совет
 *
 * Class SovetEntity
 * @package Uzh\Snowpro\Entity
 */
class SovetEntity
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
}