<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\LicenseComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\LicenseComponent Test Case
 */
class LicenseComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\LicenseComponent
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
        $registry = new ComponentRegistry();
        $this->License = new LicenseComponent($registry);
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
