<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * App\Model\Table\SpacesTable Test Case
 */
class SpacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpacesTable
     */
    public $Spaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.spaces',
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
        $config = TableRegistry::exists('Spaces') ? [] : ['className' => SpacesTable::class];
        $this->Spaces = TableRegistry::get('Spaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Spaces);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->Spaces->initialize([]);
        $this->assertEquals(
			'id',
			$this->Spaces->getPrimaryKey(),
			'The [App]Table default primary key is expected to be `id`.'
		);
        $this->assertInstanceOf(Table::class, $this->Spaces);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = new Validator();

        $validator = $this->Spaces->validationDefault($validator);

        $this->assertTrue($validator->hasField('id'));
        $this->assertTrue($validator->hasField('name'));
        $this->assertTrue($validator->hasField('description'));
        $this->assertTrue($validator->hasField('app_key'));
        $this->assertTrue($validator->hasField('app_secret'));
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
			$this->Spaces->buildRules(new RulesChecker()),
			'Cursory sanity check. buildRules() should return a ruleChecker.'
		);
    }
}
