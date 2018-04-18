<?php
namespace App\Http\Resources\Projects;

use Daybreak\Http\Resources\Json\Resource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\Users\UserProfileResource;

class ProjectIndexResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'name' => $this->entity->name,
            'description' => $this->entity->description,
            'user' => function ($q) {
                return (new UserProfileResource($q->user))->get();
            },
            'modified_at' => $this->entity->modified,
            'created_at' => $this->entity->created,
        ];
    }
}
