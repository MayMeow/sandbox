<?php
namespace App\Http\Resources;

use Daybreak\Http\Resources\Json\Resource;

class UserProjectsResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'created_at' => $this->created,
            'profile' => function ($q) {
                return (new ProfileResource($q->profile))->get();
            },
            'projects' => function ($q) {
                return ProjectResource::collection($q->projects);
            }
        ];
    }
}
