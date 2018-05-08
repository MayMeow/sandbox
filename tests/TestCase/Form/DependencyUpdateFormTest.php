<?php
namespace App\Test\TestCase\Form;

use App\Form\DependencyUpdateForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\DependencyUpdateForm Test Case
 */
class DependencyUpdateFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\DependencyUpdateForm
     */
    public $DependencyUpdate;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->DependencyUpdate = new DependencyUpdateForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DependencyUpdate);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
