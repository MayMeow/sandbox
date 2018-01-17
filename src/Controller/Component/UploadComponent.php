<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'data-dir' => 'user-data',
        'upload-domain' => 'users',
        'upload-dir' => 'images',
        'allowed' => ['png', 'jpg', 'jpeg']
    ];

    protected function _getUploadDir($config)
    {
        return WWW_ROOT . $config['data_dir'] . DS .$config['upload_domain'] . DS . $config['upload_dir'];
    }

    /**
     * Method Upload
     */
    public function upload($file = null) {
        $config = $this->config();

        $uploadDir = $this->_getUploadDir($config);
        $fileExtension = substr(strchr($file['name'], '.'), 1);
        
        if (in_array($fileExtension, $config['allowed'])) {
            if (is_uploaded_file($file['tmp_name'])) {
                $newFilename = Text::uuid() . '.' . $fileExtension;
                $subPath = $this->_getPathFromFileName($newFilename);
                $fullPath = $uploadDir . DS . $subPath['path'];
                $this->_folderExists($fullPath);
                move_uploaded_file($file['tmp_name'], $fullPath . DS . $subPath['name']);
            }
        } else {
            $newFilename = 'not allowed';
            throw new InternalErrorException('Not allowed type of file, allowed are '.Text::toList($config['allowed']), 1);
        }
        //returning full upload link....
        return $config['data_dir'] . DS . $config['upload_domain'] . DS . $config['upload_dir'] . DS . $subPath['path'] . DS . $subPath['name'];
    }

    /**
     * _folderExists method Check if exists folder for upload and if false create one.
     * @param null $folderPath
     */
    protected function _folderExists($folderPath = null) {
        $folder = new Folder('/');
        if (!$folder->cd($folderPath)) {
            $folder->create($folderPath);
        }
    }

    protected function _getPathFromFileName($filename)
    {
        return [
            'path' => substr($filename, 0, 2) . DS . substr($filename, 2, 2),
            'name' => substr($filename, 4)
        ];
    }
}
