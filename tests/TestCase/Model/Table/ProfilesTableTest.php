<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * App\Model\Table\ProfilesTable Test Case
 */
class ProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfilesTable
     */
    public $Profiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Profiles') ? [] : ['className' => ProfilesTable::class];
        $this->Profiles = TableRegistry::get('Profiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Profiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Profiles->initialize([]);
        $this->assertEquals(
			'id',
			$this->Profiles->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->Profiles);
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
			$this->Profiles->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
