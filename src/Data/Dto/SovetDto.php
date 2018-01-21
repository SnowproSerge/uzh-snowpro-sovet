<?php
/**
 * @author: Sergey Naryshkin
 * @date: 19.01.2018
 */

namespace Uzh\Snowpro\Data\Dto;


use Uzh\Snowpro\Core\Data\AbstractDto;

class SovetDto extends AbstractDto
{
    /** @var int */
    public $id_sovet;
    /** @var int */
    public $datest;
    /** @var int */
    public $dateen;
    /** @var string */
    public $title;
    /** @var string */
    public $digest;

    public function getId(): int
    {
        return $this->id_sovet;
    }

    public function setId(int $id): void
    {
        $this->id_sovet = $id;
    }
}