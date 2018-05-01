<?php
namespace App\Http\Resources\Posts;

use Daybreak\Http\Resources\Json\Resource;
use Parsedown;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\ProfileResource;

class PostViewResource extends Resource
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
            'profile' => function($q) {
                return (new ProfileResource($q->user->profile))->get();
            },
            'tags' => $this->entity->tags,
            'created_at' => $this->entity->created,
        ];
    }
}
