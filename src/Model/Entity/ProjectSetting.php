<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectSetting Entity
 *
 * @property int $id
 * @property int $project_id
 * @property string $color
 * @property bool $spaces
 * @property bool $environments
 * @property bool $issues
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectSetting extends Entity
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
        'project_id' => true,
        'color' => true,
        'spaces' => true,
        'environments' => true,
        'issues' => true,
        'project' => true
    ];
}
