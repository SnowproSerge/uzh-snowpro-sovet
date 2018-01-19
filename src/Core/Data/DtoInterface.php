<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Core\Data;


interface DtoInterface
{
    public function getId(): int;
    public function setId(int $id): void;
}