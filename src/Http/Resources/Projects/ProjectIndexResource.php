<?php
namespace App\Http\Resources\Projects;

use Daybreak\Http\Resources\Json\Resource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\ProfileResource;
use App\Http\Presenter\Projects\Settings\SettingPresenter;

class ProjectIndexResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'name' => $this->entity->name,
            'description' => $this->entity->description,
            'user' => function ($q) {
                return (new UserResource($q->user))->get();
            },
            'profile' => function ($q) {
                return (new ProfileResource($q->user->profile))->get();
            },
            'settings' => function ($q) {
                return (new SettingPresenter($q->project_setting))->get();
            },
            'modified_at' => $this->entity->modified,
            'created_at' => $this->entity->created,
        ];
    }
}
