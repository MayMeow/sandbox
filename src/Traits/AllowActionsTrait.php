<?php

namespace App\Traits;

trait AllowActionsTrait
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->deny();
        $this->Auth->allow($this->allowed_actions);
    }
}
