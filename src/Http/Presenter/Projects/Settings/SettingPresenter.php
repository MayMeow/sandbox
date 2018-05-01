<?php

namespace App\Http\Presenter\Projects\Settings;

use Daybreak\Http\Presenter\Json\Presenter;

class SettingPresenter extends Presenter
{
    public function toArray()
    {
        return [
            'id' => $this->entity->id,
            'color' => $this->entity->color,
            'spaces' => $this->entity->spaces,
            'environments' => $this->entity->environments,
            'issues' => $this->entity->issues
        ];
    }
}