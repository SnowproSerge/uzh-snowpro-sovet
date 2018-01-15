<?php
/**
 * @author Sergey Naryshkin
 * Date: 14.01.2018 21:48
 */

namespace Uzh\Snowpro\Entity;

/**
 * Сущность член совета
 *
 * Class MemberEntity
 * @package Uzh\Snowpro\Entity
 */
class MemberEntity
{
    /** @var int */
    public $idMember;
    /** @var int */
    public $idSovet;
    /** @var int */
    public $idInstr;
    /** @var string */
    public $fname;
    /** @var string */
    public $lname;
    /** @var string */
    public $programm;
}