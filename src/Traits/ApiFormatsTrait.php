<?php

namespace App\Traits;

use Cake\Http\Exception\NotFoundException;


trait ApiFormatsTrait
{

    protected $formats = [
        'xml' => 'Xml',
        'json' => 'Json'
    ];

    protected function setFormat($format = null, callable $q)
    {
        if (null == $format) {
            $selectedFormat = $this->formats['json'];
        } else {
            if (!array_key_exists($format, $this->formats)) throw new NotFoundException('404 Format is not supported'); 
            $selectedFormat = $this->formats[$format];
        }

        call_user_func($q, $selectedFormat);
    }

}