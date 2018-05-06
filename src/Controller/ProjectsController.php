<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Factories\ProjectsFactory;
use App\Factories\PermissionsFactory;
use App\Factories\Utility\ColorsFactory;
use Cake\Utility\Security;
use App\Form\DependencyUpdateForm;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['spaces']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => [
                'Users' => ['Profiles'],
                'Spaces',
                'ProjectSettings'
            ]
        ]);

        $this->set('project', $project);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function spaces($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => [
                'Users' => ['Profiles'],
                'Spaces'
            ]
        ]);

        $this->set('project', $project);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if (!$this->User->can('projects:add')) {
            $this->Flash->error('You dont have permission to do this action');
            return $this->redirect($this->referer());
        }

        $project = $this->Projects->newEntity();
        $project_settings = $this->Projects->ProjectSettings->newEntity();

        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            $project->image = ProjectsFactory::defaultPicture();
            $project->user_id = $this->Auth->user('id');

            $result = $this->Projects->getConnection()->transactional(function () use ($project, $project_settings) {
                if ($this->Projects->save($project)) {
                    $project_settings->project_id = $project->id;
                    $project_settings->color = ColorsFactory::getRandomBgColor();
                    $project_settings->app_key = Security::randomString(32);
                    $project_settings->app_secret = Security::randomString(48);
                    $this->Projects->ProjectSettings->save($project_settings);

                    return true;
                }

                return false;
            });
            
            if ($result) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }

        $this->set(compact('project', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        $dependenciesUpdateForm = new DependencyUpdateForm();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200]);

        $settings = $this->Projects->ProjectSettings->find()->where(['project_id' => $id])->first();

        $this->set(compact('project', 'users', 'settings', 'dependenciesUpdateForm'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
