<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;
use App\Model\Entity\User;

/**
 * Auth helper
 */
class AuthHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    protected $_user = null;

    public function beforeRender()
    {
        $this->_user = $this->request->getSession()->read('Auth');
    }

    public function getUser()
    {
        if ($this->_user) {
            $usersTable = TableRegistry::get('Users');
            $usersTable->setEntityClass(User::class);

            $user = $usersTable->get($this->_user['User']['id']);

            return $user;
        }

        return null;
    }
}
