<?php
namespace App\Http\Resources\Users;

use Daybreak\Http\Resources\Json\Resource;
use App\Http\Resources\ProfileResource;

class UserProfileResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'email' => $this->entity->email,
            'profile' => function ($q) {
                return (new ProfileResource($q->profile))->get();
            },
            'created_at' => $this->entity->created
        ];
    }
}
