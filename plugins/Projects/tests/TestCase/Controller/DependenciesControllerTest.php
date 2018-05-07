<?php
namespace Projects\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use Projects\Controller\DependenciesController;

/**
 * Projects\Controller\DependenciesController Test Case
 */
class DependenciesControllerTest extends IntegrationTestCase
{

    public $fixtures = [
        'app.projects',
        'app.projectSettings'
    ];

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testIndex()
    {
        $this->get('/projects/1/dependencies');
        $this->assertResponseOk();

        $this->assertResponseContains('Dependencies');
    }
}
