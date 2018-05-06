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
        $project = $this->Projects->find()->where(['projects.id' => $project])->first();
        
        $postsQuery = $this->Projects->Posts->find()
            ->matching('Projects', function ($q) use ($project) {
                return $q->where([
                    'Projects.id' => $project->id
                ]);
        });

        $posts= $this->paginate($postsQuery);

        $this->set(compact('project', 'posts'));
    }
}
