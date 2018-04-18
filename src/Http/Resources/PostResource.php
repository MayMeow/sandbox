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
            'user_id' => $this->entity->user_id,
            'created_at' => $this->entity->created,
        ];
    }
}
