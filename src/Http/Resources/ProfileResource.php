<?php
namespace App\Http\Resources;

use MayMeow\API\Resource\Resource;

class ProfileResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'name' => $this->entity->name,
            'image' => $this->entity->image,
            'bio' => $this->entity->bio,
            'facebook' => $this->entity->facebook,
            'twitter' => $this->entity->twitter,
            'user_id' => $this->entity->user_id
        ];
    }
}
