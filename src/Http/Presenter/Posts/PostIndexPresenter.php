<?php
namespace App\Http\Presenter\Posts;

use Parsedown;
use App\Http\Resources\Users\UserProfileResource;
use Daybreak\Http\Presenter\Json\Presenter;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\ProfileResource;

class PostIndexPresenter extends Presenter
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
            'created_at' => $this->entity->created,
        ];
    }
}
