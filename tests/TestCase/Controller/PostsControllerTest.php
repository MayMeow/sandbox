<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PostsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PostsController Test Case
 */
class PostsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.posts'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/posts');

        $this->assertResponseContains('Posts');
        $this->assertResponseContains('<posts-table-component></posts-table-component>');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/posts/1');

        $this->assertResponseContains('<post-view-component post-i-d="1"></post-view-component>');
        $this->assertResponseOk();
    }
}
