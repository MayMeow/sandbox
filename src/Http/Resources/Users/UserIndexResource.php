<?php
namespace App\Http\Resources\Users;

use App\Http\Resources\ProfileResource;
use Daybreak\Http\Presenter\Json\Presenter;

class UserIndexResource extends Presenter
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'profile' => function ($q) {
                return (new ProfileResource($q->profile))->get();
            },
            'created_at' => $this->created
        ];
    }
}
