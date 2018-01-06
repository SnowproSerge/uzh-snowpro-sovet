<?php
/**
 * @author: Sergey Naryshkin
 * @date: 28.12.2017
 */

namespace Uzh\Snowpro\Core;

use Uzh\Snowpro\Core\Exception\RoutingException;

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

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->viewParams = array();
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
            $this->pathParams = $pathParams;
            $viewName = $this->$actionName();
            $view = new View($viewName);
            $view->show($this->viewParams);

        } else {
            throw new RoutingException('Bad action name ' . $actionName);
        }
    }

    /**
     * @return string
     */
    public function getActionRole($action): string
    {
        if (in_array($action, $this->actionRoles))
            return $this->actionRoles[$action];
        else
            return "*";
    }
}