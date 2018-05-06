<?php
namespace App\Http\Resources\Users;

use Daybreak\Http\Presenter\Json\Presenter;

class UserResource extends Presenter
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'created_at' => $this->created
        ];
    }
}
