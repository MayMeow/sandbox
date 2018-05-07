<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\ProfilesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Api\ProfilesController Test Case
 */
class ProfilesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profiles',
        'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/api/profiles');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/api/profiles/1');
        $this->assertResponseOk();
    }
}
