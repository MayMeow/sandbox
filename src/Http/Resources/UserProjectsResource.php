<?php
namespace App\Http\Resources;

use Daybreak\Http\Resources\Json\Resource;

class UserProjectsResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'email' => $this->entity->email,
            'created_at' => $this->entity->created,
            'profile' => function ($q) {
                return (new ProfileResource($q->profile))->get();
            },
            'projects' => function ($q) {
                return ProjectResource::collection($q->projects);
            }
        ];
    }
}
