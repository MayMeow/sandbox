<?php
namespace App\Controller\Api;

use App\Controller\UsersController as BaseController;
use App\Http\Resources\UserResource;
use App\Http\Resources\ProjectResource;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends BaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->Users->find();

        $users = UserResource::collection($query);

        

        $this->set([
            'users' => $users,
            '_serialize' => ['users']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function projects($id = null)
    {
        $user = $this->Users->get($id);

        $projects = ProjectResource::collection($user->projects);

        $this->set([
            'projects' => $projects,
            '_serialize' => ['projects']
        ]);
    }
}
