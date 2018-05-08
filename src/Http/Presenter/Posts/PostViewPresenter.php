<?php
namespace App\Http\Presenter\Posts;

use MayMeow\API\Resource\Resource;
use Parsedown;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\ProfileResource;

class PostViewPresenter extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'markdown' => (new Parsedown)->text($this->body),
            'user' => function ($q) {
                return (new UserResource($q->user))->get();
            },
            'profile' => function($q) {
                return (new ProfileResource($q->user->profile))->get();
            },
            'tags' => $this->tags,
            'created_at' => $this->created,
        ];
    }
}
