<?php

namespace App\Http\Presenter\Projects\Settings;

use MayMeow\API\Resource\Resource;

class SettingPresenter extends Resource
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'color' => $this->color,
            'spaces' => $this->spaces,
            'environments' => $this->environments,
            'issues' => $this->issues
        ];
    }
}