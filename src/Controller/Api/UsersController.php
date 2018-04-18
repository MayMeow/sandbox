<?php
namespace App\Controller\Api;

use App\Controller\UsersController as BaseController;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\UserProjectsResource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\Users\UserProfileResource;

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
        $query = $this->Users->find()->contain(['Profiles']);

        $users = UserProfileResource::collection($query);

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
        $query = $this->Users->get($id);

        $user = (new UserProjectsResource($query))->get();

        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
    }
}
