<?php
namespace App\Test\TestCase\Form;

use App\Form\LicenseForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\LicenseForm Test Case
 */
class LicenseFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\LicenseForm
     */
    public $License;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->License = new LicenseForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->License);

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
