<?php
namespace App\Http\Resources\Users;

use MayMeow\API\Resource\Resource;

class UserResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'created_at' => $this->created
        ];
    }
}
