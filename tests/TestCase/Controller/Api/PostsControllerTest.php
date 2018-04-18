<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\PostsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Api\PostsController Test Case
 */
class PostsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.posts',
        'app.users',
        'app.profiles',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {

        $this->get('/api/posts.json');

        $this->assertResponseOk();
        $this->assertResponseContains('"posts":');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/api/posts/1.json');

        $this->assertResponseOk();
        $this->assertResponseContains('"id": 1');
        $this->assertResponseContains('"title": "Lorem ipsum dolor sit amet"');
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
