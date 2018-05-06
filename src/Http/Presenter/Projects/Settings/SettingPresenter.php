<?php

namespace App\Http\Presenter\Projects\Settings;

use Daybreak\Http\Presenter\Json\Presenter;

class SettingPresenter extends Presenter
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