<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\WebappHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\WebappHelper Test Case
 */
class WebappHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\WebappHelper
     */
    public $Webapp;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Webapp = new WebappHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Webapp);

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
