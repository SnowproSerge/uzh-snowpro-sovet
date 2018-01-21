<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

namespace Uzh\Snowpro\Controller;


use Uzh\Snowpro\Core\AbstractController;
use Uzh\Snowpro\Core\App;
use Uzh\Snowpro\Core\Data\RepositoryManager;
use Uzh\Snowpro\Data\Repository\MeetingRepository;

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
        /** @var MeetingRepository $repoMeet */
        $repoMeet = RepositoryManager::getRepository(MeetingRepository::class);
        $meeting = $repoMeet->getLastMeeting();
        $meeting->setRelations();
        $this->viewParams['meeting'] = $meeting;
        App::logger()->addDebug('Action index',(array) $this->viewParams['meeting']);
        return "index.twig";
    }

}