<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\User;
use Cake\TestSuite\TestCase;
use Cake\Auth\DefaultPasswordHasher;

/**
 * App\Model\Entity\User Test Case
 */
class UserTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\User
     */
    public $User;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->User = new User();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->User);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testSetPassword()
    {
        $rawPassword = 'secret';
        $this->User->password = $rawPassword;
        $hashedPassword = $this->User->password;

        // ハッシュ化済み
        $this->assertNotSame($rawPassword, $hashedPassword);

        $hasher = new DefaultPasswordHasher();
        $this->assertTrue($hasher->check($rawPassword, $hashedPassword));
    }
}
