<?php
namespace Projects\Controller;

use Projects\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * DependenciesController Controller
 *
 *
 * @method \Projects\Model\Entity\DependenciesController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DependenciesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('App.Projects');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($project)
    {
        $project = $this->Projects->find()
            ->select(['Projects.id', 'Projects.name', 'ProjectSettings.dependencies_text'])
            ->where(['Projects.id' => $project])
            ->contain('ProjectSettings')
            ->first();

        if ($project->project_setting) {
            $project->project_setting->dependencies_text = json_decode($project->project_setting->dependencies_text);
        }
        
        $this->set('project', $project);
    }
}
