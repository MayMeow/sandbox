<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProjectsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProjectsController Test Case
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
        'app.posts',
        'app.profiles',
        'app.spaces',
        'app.project_settings'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/projects');
        $this->assertResponseOk();
        $this->assertResponseContains('Projects');
        $this->assertResponseContains('<projects-table-component></projects-table-component>');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/projects/1');
        $this->assertResponseOk();
        $this->assertResponseContains('Lorem ipsum dolor sit amet');
        $this->assertResponseContains('href="/projects/1/spaces"');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testViewSpaces()
    {
        $this->get('/projects/1/spaces');
        $this->assertResponseOk();
        $this->assertResponseContains('<a href="/spaces/add" class="btn btn-success">Create space</a>');
        $this->assertResponseContains('<spaces-table-component space-id="1"></spaces-table-component>');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);

        $this->get('/projects/add');
        $this->assertResponseOk();
        $this->assertResponseContains('<legend>Add Project</legend>');
    }

    public function testAddPostData()
    {
        $projects = TableRegistry::get('Projects');
        $projects->find()->where(['id' => 1])->delete();

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'name' => 'Test Project',
            'description' => 'Test Project Description'
        ];

        $this->post('/projects/add', $data);
        $this->assertResponseSuccess();

        $query = $projects->find()->where(['name' => $data['name']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);

        $this->get('/projects/edit/1');
        $this->assertResponseOk();
        $this->assertResponseContains('id="name" value="Lorem ipsum dolor sit amet"');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    // other keys.
                ]
            ]
        ]);

        $data = ['id' => '1'];

        $this->delete('/projects/delete/' . $data['id']);
        $this->assertResponseSuccess();

        $projects = TableRegistry::get('Projects');
        $query = $projects->find()->where(['id' => $data['id']]);
        $this->assertEquals(0, $query->count());
    }
}
