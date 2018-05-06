<?php
namespace App\Http\Resources\Projects;

use App\Http\Resources\Users\UserResource;
use App\Http\Resources\ProfileResource;
use App\Http\Presenter\Projects\Settings\SettingPresenter;
use MayMeow\API\Resource\Resource;

class ProjectIndexResource extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'user' => function ($q) {
                return (new UserResource($q->user))->get();
            },
            'profile' => function ($q) {
                return (new ProfileResource($q->user->profile))->get();
            },
            'settings' => function ($q) {
                return (new SettingPresenter($q->project_setting))->get();
            },
            'modified_at' => $this->modified,
            'created_at' => $this->created,
        ];
    }
}
