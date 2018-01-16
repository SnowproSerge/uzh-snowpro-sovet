<?php
/**
 * @author: Sergey Naryshkin
 * @date: 15.01.2018
 */

namespace Uzh\Snowpro\Core\Data;


abstract class AbstractEntity
{
    /**
     * Возвращает признак новой сущности
     *
     * @return bool
     */
    public function isNew():bool
    {
        return empty($this->getId());
    }


    abstract public function setId($id): void;
    abstract public function getId();
}