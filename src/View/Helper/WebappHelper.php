<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Webapp helper
 */
class WebappHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function mix($assetPath)
    {
        $mixManifest = json_decode(file_get_contents(WWW_ROOT . 'mix-manifest.json'));

        return $mixManifest->$assetPath;
    }
}
