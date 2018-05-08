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
        $this->get('/users/1');
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

    public function testAddPostData()
    {
        $users = TableRegistry::get('Users');
        $users->find()->where(['id' => 1])->delete();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'email' => 'uer@domaiin.local',
            'password' => 'pa$$word'
        ];

        $this->post('/users/add', $data);
        $this->assertResponseSuccess();

        $query = $users->find()->where(['email' => $data['email']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testLogin()
    {
        $this->get('/login');
        $this->assertResponseOk();

        $this->assertResponseContains('Login');
    }

    public function testLoginPostData()
    {
        $users = TableRegistry::get('Users');
        $users->find()->where(['id' => 1])->delete();

        //create testing user
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $data = [
            'email' => 'uer@domaiin.local',
            'password' => 'pa$$word'
        ];
        $this->post('/users/add', $data);

        $this->post('/login', $data);

        $this->assertSession($data['email'], 'Auth.User.email');
    }

    public function testLogout()
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

        $this->get('/logout');

        $this->assertSession(null, 'Auth.User');
    }
}
