<?php

namespace Daybreak\Http\Presenter\Json;

use Cake\ORM\Entity;
use Cake\Database\Schema\Collection;
use Cake\ORM\Query;

abstract class Presenter implements PresenterInterface {
    
    protected $entity;

    /**
     * 
     */
    public function __construct($entity)
    {   
        if ($entity instanceof Entity) $this->entity = $entity;
    }

    /**
     * 
     */
    public function get()
    {
        $items = $this->toArray();

        foreach ($items as &$item)
        {
            if (is_callable($item)) {
                try {
                    $item = call_user_func($item, $this->entity);   // $item = function($q) {}
                } catch (\Exception $e) {
                    // Return nothing
                }
            }
        }

        return $items;
    }

    /**
     * 
     */
    public static function collection($entity)
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