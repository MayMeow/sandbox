<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectSettings Controller
 *
 * @property \App\Model\Table\ProjectSettingsTable $ProjectSettings
 *
 * @method \App\Model\Entity\ProjectSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectSettingsController extends AppController
{
    public function updateDependencies($id)
    {
        if ($this->request->is('post')) {
            $projectSettings = $this->ProjectSettings->get($id);
            $file = $this->request->getData('dependencies_file');

            $projectSettings->dependencies_text = file_get_contents($file['tmp_name']);

            if ($this->ProjectSettings->save($projectSettings)) {
                return $this->redirect($this->referer());
            };
        }
    }
}
