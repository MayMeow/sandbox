<?php
namespace App\Controller\Api;

use App\Controller\PostsController as BaseController;
use Parsedown;
use App\Traits\ApiFormatsTrait;
use App\Http\Presenter\Posts\PostIndexPresenter;
use App\Http\Presenter\Posts\PostViewPresenter;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends BaseController
{
    // removed RequestHandler - look at AppController
    use ApiFormatsTrait;

    public $paginate = [
        'limit' => 10
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $postsData = $this->paginate($this->Posts->find()->contain([
            'Users' => ['Profiles']
        ]));
        $posts = PostIndexPresenter::collection($postsData);

        // set data format
        $this->setFormat($this->request->getQuery('format'), function($x) {
            $this->viewBuilder()->setClassName($x);
        });

        $this->set([
            'posts' => $posts,
            'paging' => $this->request->getParam('paging'),
            '_serialize' => ['posts', 'paging']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [
                'Users' => ['Profiles'],
                'Tags'
            ]
        ]);

        // set data format
        $this->setFormat($this->request->getQuery('format'), function($x) {
            $this->viewBuilder()->setClassName($x);
        });

        $post = (new PostViewPresenter($post))->get();

        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);
    }
}
