<?php

namespace App\Factories\Utility;

class ColorsFactory
{
    const BG_COLORS = [
        'bg-purple',
        'bg-indigo',
        'bg-pink',
        'bg-primary',
        'bg-secondary',
        'bg-success',
        'bg-info',
        'bg-warning',
        'bg-danger',
        'bg-dark'
    ];

    public static function getRandomBgColor()
    {
        $rnd_key = array_rand(static::BG_COLORS, 1);
        return static::BG_COLORS[$rnd_key];
    }
}
