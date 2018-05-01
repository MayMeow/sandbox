<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionsRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * App\Model\Table\PermissionsRolesTable Test Case
 */
class PermissionsRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionsRolesTable
     */
    public $PermissionsRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissions_roles',
        'app.roles',
        'app.permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PermissionsRoles') ? [] : ['className' => PermissionsRolesTable::class];
        $this->PermissionsRoles = TableRegistry::get('PermissionsRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissionsRoles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->PermissionsRoles->initialize([]);
        $this->assertEquals(
			'id',
			$this->PermissionsRoles->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->PermissionsRoles);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
			$this->PermissionsRoles->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
