<?php
namespace App\Controller\Api;

use App\Controller\ProjectsController as BaseController;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\Projects\ProjectIndexResource;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends BaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->Projects->find()->contain([
            'Users' => ['Profiles']
        ]);

        $projects = ProjectIndexResource::collection($query);

        $this->set([
            'projects' => $projects,
            '_serialize' => ['projects']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Spaces']
        ]);

        $this->set([
            'project' => $project,
            '_serialize' => ['project']
        ]);
    }
}
