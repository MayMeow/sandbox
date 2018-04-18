<?php
namespace App\Controller\Admin;

use App\Controller\UsersController as BaseController;
use Cake\Database\Exception\NestedTransactionRollbackException;

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
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $roles = $this->Users->roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function assignRole($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $role = $this->Users->Roles->get($this->request->getData('roles'));

        try {
            $this->Users->getConnection()->transactional(function () use ($role, $user) {
                $this->Users->assignRole($user, [$role]);
            });
        } catch (NestedTransactionRollbackException $e) {
            $this->Flash->error($e->getMessage() . ' - Association already exists');
        }

        return $this->redirect($this->referer());
    }

    public function revokeRole($id = null, $role = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $role = $this->Users->Roles->get($role);

        try {
            $this->Users->getConnection()->transactional(function () use ($role, $user) {
                $this->Users->revokeRole($user, [$role]);
            });
        } catch (NestedTransactionRollbackException $e) {
            $this->Flash->error($e->getMessage() . ' - Association already exists');
        }

        return $this->redirect($this->referer());
    }
}
