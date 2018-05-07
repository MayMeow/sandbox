<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\ProjectsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Api\ProjectsController Test Case
 */
class ProjectsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects',
        'app.users',
        'app.profiles',
        'app.spaces',
        'app.projectSettings',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/api/projects');
        $this->assertResponseOk();

        $this->assertResponseContains('projects');
    }

    /**
     * Test view method
     *
    * @return void
     */
    public function testView()
    {
        $this->get('/api/projects/1');
        $this->assertResponseOk();

        $this->assertResponseContains('Lorem ipsum dolor sit amet');
    }  
}
