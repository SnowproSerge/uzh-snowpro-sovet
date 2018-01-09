<?php
/**
 * @author Sergey Naryshkin
 * Date: 09.01.2018 12:46
 */

namespace Uzh\Snowpro\Services;


use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Core\Exception\UnauthorizedException;
use Uzh\Snowpro\Core\Security\Auth;
use Uzh\Snowpro\Core\Security\Role;

class SnowproAuth extends Auth
{
    /**
     * @throws UnauthorizedException
     */
    public function init()
    {
        try {
            $handle = fopen('https://snowpro.ru/cgi-bin/axis/checkdruser.cgi?ask=1', 'r');
            $str = fgets($handle);
        } catch (\Exception $e) {
            throw new UnauthorizedException('Невозможно проверить авторизацию : '.$e->getMessage());
        }
//        $params = urlencode($str);
        $params = $str;
        App::logger()->addInfo('Auth cookies = '.$params);
        fclose($handle);
        if(empty($params))
            throw new UnauthorizedException('Нет авторизации!');
        try {
            $handle = fopen('https://snowpro.ru/cgi-bin/axis/checkdruser.cgi?ask=2&coo='.$params, 'r');
            $str = fgets($handle);
        }  catch (\Exception $e) {
            throw new UnauthorizedException('Невозможно проверить авторизацию : '.$e->getMessage());
        }
//        $str = '{"Dmitry":{"rights":{"redactor":"10","sovet":"5","author":"9","instructor":"4"}}}';
        $user = json_decode($str,true);
        App::logger()->addInfo('Auth = ',$user);
        $this->login = 'Alya';
        $this->role = new Role(Role::ADMIN);
    }

}