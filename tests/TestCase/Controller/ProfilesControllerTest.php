<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProfilesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProfilesController Test Case
 */
class ProfilesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profiles'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/profiles');
        $this->assertResponseOk();
        $this->assertResponseContains('Profiles');
        $this->assertResponseContains('<profiles-table-component></profiles-table-component>');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/profiles/1');
        $this->assertResponseOk();
        $this->assertResponseNotContains('<a href="/settings/profiles/edit/1" class="btn btn-outline-secondary">Edit</a>');
        $this->assertResponseContains('<img src="/Lorem%20ipsum%20dolor%20sit%20amet" class="rounded-circle img-thumbnail" width="100px" height="100px" alt=""/>');

        $this->get('/profiles/2');
        $this->assertResponseOk();
        $this->assertResponseNotContains('<a href="/settings/profiles/edit/1" class="btn btn-outline-secondary">Edit</a>');
        $this->assertResponseContains('<img src="/" class="rounded-circle img-thumbnail" width="100px" height="100px" alt=""/>');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testViewByOwner()
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
        $this->get('/profiles/1');
        $this->assertResponseOk();
        $this->assertResponseContains('<a href="/settings/profiles/edit/1" class="btn btn-outline-secondary">Edit</a>');
    }
}
