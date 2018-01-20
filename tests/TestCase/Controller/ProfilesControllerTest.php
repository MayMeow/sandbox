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
        $this->get('/profiles/view/1');
        $this->assertResponseOk();
        $this->assertResponseNotContains('<a href="/settings/profiles/edit/1" class="btn btn-outline-secondary">Edit</a>');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testViewOwnedBy()
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
        $this->get('/profiles/view/1');
        $this->assertResponseOk();
        $this->assertResponseContains('<a href="/settings/profiles/edit/1" class="btn btn-outline-secondary">Edit</a>');
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
