<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\ee\Model\License;

/**
 * License component
 */
class LicenseComponent extends Component
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
    public function check($feature)
    {
        return License::check($feature);
    }
}
