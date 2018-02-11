<?php
namespace App\Controller\Ee;

use App\Controller\AppController;
use App\Form\LicenseForm;
use App\ee\Model\License;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Setting;

/**
 * License Controller
 *
 */
class LicenseController extends AppController
{
    public function index()
    {
        //if (!License::check('epics')) throw new NotFoundException;

        $licenseForm = new LicenseForm();
        $license = License::import();

        $this->set(compact('license', 'licenseForm'));
    }

    public function upload()
    {
        $file = $this->request->getData('webapp_license');
        $settingsTable = TableRegistry::get('settings');

        $newLicense = (new Setting([
            'key' => License::LICENSE_SETTING_KEY,
            'value' => file_get_contents($file['tmp_name'])
        ]));

        if ($settingsTable->save($newLicense)) {
            return $this->redirect($this->referer());
        }
    }

    public function delete()
    {
        $settingsTable = TableRegistry::get('settings');
        $settingsTable->deleteAll(['key' => License::LICENSE_SETTING_KEY]);

        return $this->response->withStatus(200);
    }
}
