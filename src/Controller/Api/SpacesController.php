<?php
namespace App\Controller\Api;

use App\Controller\SpacesController as BaseController;

/**
 * Spaces Controller
 *
 * @property \App\Model\Table\SpacesTable $Spaces
 *
 * @method \App\Model\Entity\Space[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpacesController extends BaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        if ($id == null) {
            $this->paginate = [
                'contain' => ['Projects']
            ];
            $spaces = $this->paginate($this->Spaces);
        } else {
            $query = $this->Spaces->find()->contain(['Projects'])->where(['spaces.id' => $id]);
            $spaces = $this->paginate($query);
        }

        $this->set([
            'spaces' => $spaces,
            '_serialize' => ['spaces']
        ]);
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

        $this->set([
            'space' => $space,
            '_serialize' => ['space']
        ]);
    }
}
