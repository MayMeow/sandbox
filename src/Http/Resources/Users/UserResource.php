<?php
namespace App\Http\Resources\Users;

use Daybreak\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'email' => $this->entity->email,
            'profile_id' => $this->entity->profile_id,
            'created_at' => $this->entity->created
        ];
    }
}
