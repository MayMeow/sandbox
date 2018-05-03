<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ProjectDependencies Controller
 *
 * @property \App\Model\Table\ProjectsTable $projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectDependenciesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->modelClass = false;
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($project)
    {
        $projects = TableRegistry::get('Projects');
        $projects->setEntityClass('Project');
        $project = $projects->find()
            ->select(['Projects.id', 'Projects.name', 'ProjectSettings.dependencies_text'])
            ->where(['Projects.id' => $project])
            ->contain('ProjectSettings')
            ->first();

        $project->project_setting->dependencies_text = json_decode($project->project_setting->dependencies_text);
        $this->set('project', $project);
    }
}
