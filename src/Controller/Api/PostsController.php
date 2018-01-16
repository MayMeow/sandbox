<?php
namespace App\Controller\Api;

use App\Controller\PostsController as BaseController;
use Parsedown;

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
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts);

        $this->set([
            'posts' => $posts,
            '_serialize' => ['posts']
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
            'contain' => []
        ]);

        $parsedown = new Parsedown();
        $post->markdown = $parsedown->text($post->body);

        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);
    }
}
