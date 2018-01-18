<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Spaces Controller
 *
 * @property \App\Model\Table\SpacesTable $Spaces
 *
 * @method \App\Model\Entity\Space[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        //
        $this->set('spaceID', $id);
    }

    /**
     * View method
     *
     * @param string|null $id Space id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $space = $this->Spaces->get($id, [
            'contain' => ['Projects']
        ]);

        $this->set('space', $space);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $space = $this->Spaces->newEntity();
        if ($this->request->is('post')) {
            $space = $this->Spaces->patchEntity($space, $this->request->getData());
            if ($this->Spaces->save($space)) {
                $this->Flash->success(__('The space has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The space could not be saved. Please, try again.'));
        }
        $projects = $this->Spaces->Projects->find('list', ['limit' => 200]);
        $this->set(compact('space', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Space id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $space = $this->Spaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $space = $this->Spaces->patchEntity($space, $this->request->getData());
            if ($this->Spaces->save($space)) {
                $this->Flash->success(__('The space has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The space could not be saved. Please, try again.'));
        }
        $projects = $this->Spaces->Projects->find('list', ['limit' => 200]);
        $this->set(compact('space', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Space id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $space = $this->Spaces->get($id);
        if ($this->Spaces->delete($space)) {
            $this->Flash->success(__('The space has been deleted.'));
        } else {
            $this->Flash->error(__('The space could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
