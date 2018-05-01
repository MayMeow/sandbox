<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * App\Model\Table\RolesUsersTable Test Case
 */
class RolesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesUsersTable
     */
    public $RolesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles_users',
        'app.roles',
        'app.permissions',
        'app.permissions_roles',
        'app.users',
        'app.profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RolesUsers') ? [] : ['className' => RolesUsersTable::class];
        $this->RolesUsers = TableRegistry::get('RolesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RolesUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->RolesUsers->initialize([]);
        $this->assertEquals(
			'id',
			$this->RolesUsers->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->RolesUsers);
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
			$this->RolesUsers->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
