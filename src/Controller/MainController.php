<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controller;


use Uzh\Snowpro\Core\AbstractController;
use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Data\Repository\InstructorRepository;

class MainController extends AbstractController
{

    /**
     * Заполнение таблицы доступа
     */
    protected function setRestrictions()
    {
        // TODO: Implement setRestrictions() method.
        $this->actionRoles = [];
    }

    public function indexAction()
    {
        $instr = new InstructorRepository($this->dbConnection);
        $this->viewParams['text'] = print_r($instr->getListEntities(),true);
        App::logger()->addInfo('Action info');
        return "test.twig";
    }

}