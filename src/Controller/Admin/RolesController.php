<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Database\Exception\NestedTransactionRollbackException;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Permissions']
        ]);

        $permissions = $this->Roles->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('role', 'permissions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }

        $permissions = $this->Roles->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('role', 'permissions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Permissions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $permissions = $this->Roles->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('role', 'permissions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function assignPermission($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        $permission = $this->Roles->Permissions->get($this->request->getData('permissions'));

        try {
            $this->Roles->getConnection()->transactional(function() use ($role, $permission) {
                $this->Roles->givePermissionTo($role, [$permission]);
            });
        } catch (NestedTransactionRollbackException $e) {
            $this->Flash->error($e->getMessage() . ' - Association already exists');
        }

        return $this->redirect($this->referer());
    }

    public function revokePermission($id = null, $permission = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        $permission = $this->Roles->Permissions->get($permission);

        try {
            $this->Roles->getConnection()->transactional(function() use ($role, $permission) {
                $this->Roles->revokePermissionTo($role, [$permission]);
            });
        } catch (NestedTransactionRollbackException $e) {
            $this->Flash->error($e->getMessage() . ' - Association already exists');
        }

        return $this->redirect($this->referer());
    }
}
