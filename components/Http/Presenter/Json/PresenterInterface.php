<?php

namespace Daybreak\Http\Presenter\Json;

use Cake\ORM\Entity;

interface PresenterInterface
{
    public function toArray();

    public function __get($name);

    public function __set($name, $value);

    public static function collection($entity);
}