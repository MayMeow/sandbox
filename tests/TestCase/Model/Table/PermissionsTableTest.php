<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * App\Model\Table\PermissionsTable Test Case
 */
class PermissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionsTable
     */
    public $Permissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissions',
        'app.roles',
        'app.permissions_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Permissions') ? [] : ['className' => PermissionsTable::class];
        $this->Permissions = TableRegistry::get('Permissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permissions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Permissions->initialize([]);
        $this->assertEquals(
			'id',
			$this->Permissions->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->Permissions);
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
			$this->Permissions->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
