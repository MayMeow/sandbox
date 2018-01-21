<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.profiles'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');
        
        $this->assertResponseContains('Users');
        $this->assertResponseContains('<users-table-component></users-table-component>');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');
        $this->assertResponseOk();

        $this->assertResponseContains('<user-view-component user-id="1"></user-view-component>');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/users/add');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddPostData()
    {
        $data = [
            'email' => 'test@test.sk',
            'password' => 'secret'
        ];

        $this->post('/users/add', $data);
        $this->assertResponseSuccess();

        $users = TableRegistry::get('Users');
        $query = $users->find('all')->where(['email' => $data['email']]);
        $this->assertEquals(1, $query->count());

        $profiles = TableRegistry::get('Profiles');
        $queryProfile = $profiles->find()->where(['name' => $data['email']]);
        $this->assertEquals(1, $queryProfile->count());
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
