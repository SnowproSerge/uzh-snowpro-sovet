<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controller;


use Uzh\Snowpro\Core\AbstractController;
use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Repository\SovetRepository;

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
        /** @var SovetRepository $repoSovet */
        $repoSovet = RepositoryManager::getRepository(SovetRepository::class);
        $this->viewParams['sovet'] = $repoSovet->getLastSovet();
        App::logger()->addInfo('Action index',(array) $this->viewParams['sovet']);
        return "index.twig";
    }

}