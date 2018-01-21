<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controller;


use Uzh\Snowpro\Core\AbstractController;
use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Repository\InstructorRepository;

class MainController extends AbstractController
{

    /**
     * Заполнение таблицы доступа
     */
    protected function setRestrictions(): void
    {
        // TODO: Implement setRestrictions() method.
        $this->actionRoles = [];
    }

    public function indexAction()
    {
        $instr = RepositoryManager::getRepository(InstructorRepository::class);
        $this->viewParams['text'] = print_r($instr->getAllEntities(),true);
        App::logger()->addInfo('Action info');
        return "index.twig";
    }

}