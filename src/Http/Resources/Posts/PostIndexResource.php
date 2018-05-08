<?php
namespace App\Http\Resources\Posts;

use Parsedown;
use App\Http\Resources\Users\UserProfileResource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\ProfileResource;
use MayMeow\API\Resource\Resource;

class PostIndexResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'markdown' => function ($q) {
                return (new Parsedown)->text($q->body);
            },
            'user' => function ($q) {
                return (new UserResource($q->user))->get();
            },
            'profile' => function($q) {
                return (new ProfileResource($q->user->profile))->get();
            },
            'created_at' => $this->created,
        ];
    }
}
