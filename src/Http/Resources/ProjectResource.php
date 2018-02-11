<?php
namespace App\Http\Resources;

use Daybreak\Http\Resources\Json\Resource;

class ProjectResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'name' => $this->entity->name,
            'description' => $this->entity->description,
            'user' => function ($q) {
                return (new UserResource($q->user))->get();
            },
            'modified_at' => $this->entity->modified,
            'created_at' => $this->entity->created,
        ];
    }
}