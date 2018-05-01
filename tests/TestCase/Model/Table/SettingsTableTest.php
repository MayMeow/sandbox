<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * App\Model\Table\SettingsTable Test Case
 */
class SettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SettingsTable
     */
    public $Settings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Settings') ? [] : ['className' => SettingsTable::class];
        $this->Settings = TableRegistry::get('Settings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Settings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Settings->initialize([]);
        $this->assertEquals(
			'id',
			$this->Settings->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->Settings);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->assertInstanceOf(
			RulesChecker::class,
			$this->Settings->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
