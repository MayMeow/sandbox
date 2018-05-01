<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * App\Model\Table\ProjectSettingsTable Test Case
 */
class ProjectSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSettingsTable
     */
    public $ProjectSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_settings',
        'app.projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectSettings') ? [] : ['className' => ProjectSettingsTable::class];
        $this->ProjectSettings = TableRegistry::get('ProjectSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSettings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->ProjectSettings->initialize([]);
        $this->assertEquals(
			'id',
			$this->ProjectSettings->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->ProjectSettings);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new Validator();

        $validator = $this->ProjectSettings->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('color'));
        $this->assertTrue($validator->hasField('spaces'));
        $this->assertTrue($validator->hasField('environments'));
        $this->assertTrue($validator->hasField('issues'));
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->assertInstanceOf(
			RulesChecker::class,
			$this->ProjectSettings->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
