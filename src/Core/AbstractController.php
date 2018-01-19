<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\Core;

use PHPUnit\Runner\Exception;
use Uzh\Snowpro\Core\Data\DbConnection;
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

    /** @var DbConnection */
    protected $dbConnection;

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
    abstract protected function setRestrictions(): void;

    /**
     *
     * Метод получает имя action, запускает его и поле вызывает полученный шаблон с полученными параметрвами
     *
     * @param $action
     * @param $pathParams
     * @throws \PHPUnit\Runner\Exception
     * @throws RoutingException
     */
    public function actionProcess($action, $pathParams): void
    {
        $actionName = $action . 'Action';
        if (method_exists($this, $actionName)) {
            if(!$this->isAuthAction($action)) {
                throw new Exception('Недостаточно прав для использования! Обратитесь к администратору.');
            }
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
        if (\in_array($action, $this->actionRoles, true)) {
            return true;
        }
        $role = $this->auth->getRole()->getRole();
        if ( $role === Role::ADMIN) {
            return true;
        }
        return \in_array($role, $this->actionRoles[$action], true);

    }

    /**
     * @param Auth $auth
     */
    public function setAuth(Auth $auth): void
    {
        $this->auth = $auth;
    }

    /**
     * @param DbConnection $dbConnection
     */
    public function setDbConnection(DbConnection $dbConnection): void
    {
        $this->dbConnection = $dbConnection;
    }

}