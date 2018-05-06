<?php
namespace App\Http\Resources;

use MayMeow\API\Resource\Resource;
use Parsedown;

class PostResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'markdown' => (new Parsedown)->text($this->body),
            'user_id' => $this->user_id,
            'created_at' => $this->created,
        ];
    }
}
