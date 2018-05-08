<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectSettingsFixture
 *
 */
class ProjectSettingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'project_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'color' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'fixed' => null, 'collate' => null],
        'dependencies_text' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'spaces' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'precision' => null, 'comment' => null],
        'environments' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'precision' => null, 'comment' => null],
        'issues' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'project_id' => 1,
                'color' => 'Lorem ipsum dolor sit amet',
                'spaces' => 1,
                'environments' => 1,
                'issues' => 1
            ],
        ];
        parent::init();
    }
}
