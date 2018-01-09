<?php
/**
 * @author Sergey Naryshkin
 * Date: 07.01.2018 7:40
 */

namespace Uzh\Snowpro\Core\Security;


class Role
{
    const READER =1;
    const WRITER = 2;
    const ADMIN = 100;
    /**
     * @var int
     */
    private $role;

    /**
     * Role constructor.
     * @param int $role
     */
    public function __construct(int $role)
    {
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }
}