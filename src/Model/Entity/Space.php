<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Space Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $project_id
 * @property string $app_key
 * @property string $app_secret
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Project $project
 */
class Space extends Entity
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
        'description' => true,
        'project_id' => true,
        'app_key' => true,
        'app_secret' => true,
        'created' => true,
        'modified' => true,
        'project' => true
    ];
}
