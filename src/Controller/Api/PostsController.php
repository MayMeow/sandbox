<?php
namespace App\Controller\Api;

use App\Controller\PostsController as BaseController;
use Parsedown;
use App\Http\Resources\PostIndexResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\Posts\PostViewResource;

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
        $posts = PostIndexResource::collection($postsData);

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
            'contain' => ['Users', 'Tags']
        ]);

        $parsedown = new Parsedown();
        $post->markdown = $parsedown->text($post->body);

        $post = (new PostViewResource($post))->get();

        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);
    }
}
