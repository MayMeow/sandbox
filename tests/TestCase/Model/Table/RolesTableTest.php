<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * App\Model\Table\RolesTable Test Case
 */
class RolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesTable
     */
    public $Roles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles',
        'app.permissions',
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
        $config = TableRegistry::exists('Roles') ? [] : ['className' => RolesTable::class];
        $this->Roles = TableRegistry::get('Roles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Roles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Roles->initialize([]);
        $this->assertEquals(
			'id',
			$this->Roles->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->Roles);
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
			$this->Roles->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
