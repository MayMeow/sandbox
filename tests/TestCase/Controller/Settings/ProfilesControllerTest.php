<?php
namespace App\Test\TestCase\Controller\Settings;

use App\Controller\Settings\ProfilesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Settings\ProfilesController Test Case
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
        $this->get('/settings/profiles/edit/1');
        $this->assertResponseOk();
    }
}
