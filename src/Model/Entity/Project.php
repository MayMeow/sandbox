<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Space[] $spaces
 */
class Project extends Entity
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
        'name' => true,
        'image' => true,
        'description' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'spaces' => true
    ];

    protected function _getUser()
    {
        return (TableRegistry::get('users'))->find()->where(['id' => $this->_properties['user_id']])->first();
    }
}
