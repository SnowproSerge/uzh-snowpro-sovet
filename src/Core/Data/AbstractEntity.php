<?php
/**
 * @author: Sergey Naryshkin
 * @date: 15.01.2018
 */

namespace Uzh\Snowpro\Core\Data;


abstract class AbstractEntity
{
    /** @var bool */
    protected $fill;


    /**
     * AbstractEntity constructor.
     * @param int|null $id
     */
    public function __construct($id=null)
    {
        $this->fill = false;
        $this->setId($id);
    }

    /**
     * Возвращает признак новой сущности
     *
     * @return bool
     */
    public function isNew():bool
    {
        return empty($this->getId());
    }

    /**
     * @return bool
     */
    public function isFill(): bool
    {
        return $this->fill;
    }

    /**
     *  Setting fill entity
     */
    public function setFill(): void
    {
        $this->fill = true;
    }

    /**
     * Filling data of property - entity
     */
    public function setRelations() {}


    abstract public function setId($id): void;
    abstract public function getId(): int;
    abstract public function init($dto): void;

}