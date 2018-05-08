<?php
namespace Projects\Controller\Api;

use Projects\Controller\AppController;
use App\Http\Resources\PostResource;
use App\Traits\ApiFormatsTrait;
use Cake\Event\Event;

/**
 * Posts Controller
 *
 *
 * @method \Projects\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    use ApiFormatsTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('App.Projects');
    }

    /**
     * 
     */
    public function beforeRender(Event $event)
    {
        // set data format
        $this->setFormat($this->request->getQuery('format'), function($x) {
            $this->viewBuilder()->setClassName($x);
        });
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

        $this->set([
            'posts' => PostResource::collection($postsQuery),
            '_serialize' => ['posts']
        ]);
    }

   
}
