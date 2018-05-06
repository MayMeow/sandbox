<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use App\Factories\PermissionsFactory;

/**
 * User helper
 */
class UserHelper extends Helper
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
        return PermissionsFactory::can($permission);
    }

}
