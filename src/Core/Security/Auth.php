<?php
/**
 * @author Sergey Naryshkin
 * Date: 07.01.2018 7:39
 */

namespace Uzh\Snowpro\Core\Security;




/**
 * Получает авторизацию
 *
 * Class Auth
 * @package Uzh\Snowpro\Core\Security
 */
abstract class Auth
{
    /**
     * @var string
     */
    protected $login;
    /** @var Role  */
    protected $role;

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    public abstract function init();

}