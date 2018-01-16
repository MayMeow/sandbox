<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $bio
 * @property string $location
 * @property string $facebook
 * @property string $twitter
 * @property string $image
 * @property string $url
 */
class Profile extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'name' => true,
        'bio' => true,
        'location' => true,
        'facebook' => true,
        'twitter' => true,
        'image' => true,
        'url' => true
    ];
}
