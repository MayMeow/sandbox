<?php
namespace App\Http\Resources;

use Daybreak\Http\Resources\Json\Resource;
use Parsedown;
use App\Http\Resources\Users\UserProfileResource;

class PostIndexResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'title' => $this->entity->title,
            'body' => $this->entity->body,
            'markdown' => (new Parsedown)->text($this->entity->body),
            'user_id' => function ($q) {
                return (new UserProfileResource($q->user))->get();
            },
            'created_at' => $this->entity->created,
        ];
    }
}