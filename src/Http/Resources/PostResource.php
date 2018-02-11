<?php
namespace App\Http\Resources;

use Daybreak\Http\Resources\Json\Resource;
use Parsedown;

class PostResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'title' => $this->entity->title,
            'body' => $this->entity->body,
            'markdown' => (new Parsedown)->text($this->entity->body),
            'user' => function ($q) {
                return (new UserResource($q->user))->get();
            },
            'created_at' => $this->entity->created,
        ];
    }
}