<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\Core;

use PHPUnit\Runner\Exception;
use Uzh\Snowpro\Core\Exception\RoutingException;
use Uzh\Snowpro\Core\Security\Auth;
use Uzh\Snowpro\Core\Security\Role;

/**
 * Class AbstractController
 * @package SimAppletWifc\Controller
 *
 * Контроллер получает параметры запроса и передаёт их в action
 * Метод action должен заканчавться на 'Action'. он должен вернуть имя шаблона и установить
 * необходимые для отображения $viewParams
 *
 */
abstract class AbstractController
{
    /** @var array */
    protected $viewParams;

    /**  @var array */
    protected $pathParams;

    /** @var array */
    protected $actionRoles;
    /** @var Auth */
    protected $auth;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->viewParams = array();
        $this->setRestrictions();
    }

    /**
     * Заполнение таблицы доступа
     */
    protected abstract function setRestrictions();
    /**
     *
     * Метод получает имя action, запускает его и поле вызывает полученный шаблон с полученными параметрвами
     *
     * @param $action
     * @param $pathParams
     * @throws RoutingException
     */
    public function actionProcess($action, $pathParams): void
    {
        $actionName = $action . 'Action';
        if (method_exists($this, $actionName)) {
            if(!$this->isAuthAction($action))
                throw new Exception('Недостаточно прав для использования! Обратитесь к администратору.');
            $this->pathParams = $pathParams;
            $viewName = $this->$actionName();
            $view = new View($viewName);
            $view->show($this->viewParams);

        } else {
            throw new RoutingException('Bad action name ' . $actionName);
        }
    }

    /**
     * @param $action
     * @return bool
     */
    public function isAuthAction($action): bool
    {
        if (in_array($action, $this->actionRoles))
            return true;
        if ($this->auth->getRole()->getRole() == Role::ADMIN)
            return true;
        return (in_array($this->auth->getRole()->getRole(),$this->actionRoles[$action]));

    }

    /**
     * @param Auth $auth
     */
    public function setAuth(Auth $auth): void
    {
        $this->auth = $auth;
    }

}