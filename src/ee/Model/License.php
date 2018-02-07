<?php

namespace App\ee\Model;

class License 
{
    const ENCRYPTION_KEY = '.license_encryption_key.pub';

    const LICENSE_SETTING_KEY = 'WEBAPP_LICENSE';

    const LICENSE_FEATURES = [
        'Starter' => [
            'epics',
            'groups'
        ],
        'Premium' => [
            'epics',
            'groups'
        ],
        'Ultimate' => [
            'epics',
            'groups'
        ]
    ];

    public static function import()
    {

    }

    public static function check()
    {
        
    }
}