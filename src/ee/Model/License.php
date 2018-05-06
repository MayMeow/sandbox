<?php

namespace App\ee\Model;

use Cake\ORM\TableRegistry;
use Cake\Chronos\Chronos;

class License
{
    /**
     * 
     */
    const ENCRYPTION_KEY = '.license_encryption_key.pub';

    /**
     * 
     */
    const LICENSE_SETTING_KEY = 'WEBAPP_LICENSE';

    /**
     * 
     */
    const LICENSE_FEATURES = [
        'Starter' => [
            'variable_certificates_range'
        ],
        'Premium' => [

        ],
        'Ultimate' => [

        ]
    ];

    /**
     * Do not merge with oter licenses
     */
    const EARLY_ADOPTER = [
        'epics'
    ];

    /**
     * 
     */
    protected static function featuresByLicense($license)
    {
        $starter = static::LICENSE_FEATURES['Starter'];
        $premium = array_merge($starter, static::LICENSE_FEATURES['Premium']);
        $ultimate = array_merge($premium, static::LICENSE_FEATURES['Ultimate']);

        $featuresByLicense = [
            'Starter' => $starter,
            'Premium' => $premium,
            'Ultimate' => $ultimate,
            'EarlyAdopter' => static::EARLY_ADOPTER
        ];

        if(!array_key_exists($license, $featuresByLicense)) return false;

        return $featuresByLicense[$license];
    }

    /**
     * 
     */
    public static function import()
    {
        $licenseString = (TableRegistry::get('settings'))->find()->where(['key' => static::LICENSE_SETTING_KEY])->first();
        $decryptionKey = file_get_contents(ROOT . DS . self::ENCRYPTION_KEY);

        if ($licenseString) {
            openssl_public_decrypt(base64_decode($licenseString->value), $decrypted, $decryptionKey);
            $license = json_decode($decrypted);

            $license->started_at = Chronos::createFromTimestamp($license->started_at);
            $license->expires_at = Chronos::createFromTimestamp($license->expires_at);

            return $license;
        }

        return false;
    }

    /**
     * 
     */
    public static function expired()
    {
        $license = self::import();

        if ($license->expires_at < Chronos::now()) {
            return true;
        }

        return false;
    }

    /**
     * 
     */
    public static function isValid()
    {
        // If license is not expired then is valid
        if (!self::expired()) return true;

        return false;
    }

    /**
     * 
     */
    public static function check($feature)
    {
        $license = self::import();

        // if there is no license retun false
        if (false == $license) {
            return false;
        }

        // Check if license is expired and return false if expired
        if ($license->expires_at < Chronos::now()) {
            return false;
        }

        // If license is trial return ture
        if ($license->type == 'Trial') {
            return true;
        }

        // Check if license has required features
        $featuresByLicense = self::featuresByLicense($license->type);
        if (!in_array($feature, $featuresByLicense)) {
            return false;
        }

        // Return true oterwise
        return true;
    }
}
