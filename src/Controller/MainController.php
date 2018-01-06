<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controller;


use Uzh\Snowpro\Core\AbstractController;

class MainController extends AbstractController
{

    /**
     * Заполнение таблицы доступа
     */
    protected function setRestrictions()
    {
        // TODO: Implement setRestrictions() method.
    }

    public function indexAction()
    {
        return "test.twig";
    }

}