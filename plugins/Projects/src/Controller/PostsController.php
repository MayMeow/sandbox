<?php
namespace Projects\Controller;

use Projects\Controller\AppController;

/**
 * Posts Controller
 *
 *
 * @method \Projects\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
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
        $this->set(compact('project'));
    }
}
