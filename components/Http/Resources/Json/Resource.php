<?php

namespace Daybreak\Http\Resources\Json;

use Cake\ORM\Entity;
use Cake\Database\Schema\Collection;
use Cake\ORM\Query;

abstract class Resource implements ResourceInterface {
    
    protected $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }

    public function get()
    {
        $items = $this->toArray();

        foreach ($items as &$item)
        {
            if (is_callable($item)) $item = call_user_func($item, $this->entity);
        }

        return $items;
    }

    public static function collection(Query $entity)
    {
        $array = [];

        $AnonymousResource = get_called_class();

        foreach ($entity as $item)
        {
            $array[] = (new $AnonymousResource($item))->get();
        }
        
        return $array;
    }

}