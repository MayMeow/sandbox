<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\Factories\PermissionsFactory;

/**
 * User component
 */
class UserComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * 
     */
    public function can($permission)
    {
        return PermissionsFactory::can($permission, $this->getController()->getRequest()->getSession());
    }
}
