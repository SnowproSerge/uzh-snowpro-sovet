<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Core\Data;


abstract class AbstractDto
{
    abstract public function getId(): int;
    abstract public function setId(int $id): void;
}