<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users',
    ];

    /**
     * ログインページが表示される
     */
    public function testLoginShow()
    {
        $this->get('/users/login');
        $this->assertResponseOk();
        $this->assertResponseContains('ログイン');
    }

    /**
     * ログイン失敗
     */
    public function testLoginFailed()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/users/login', [
            'email' => 'tom.sugai@example.com',
            'password' => 'wrongpassword',
        ]);
        $this->assertResponseOk();
        $this->assertResponseContains('ユーザー名またはパスワードが不正です。');
    }

    /**
     * ログイン成功
     */
    public function testLoginSucceed()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/users/login?redirect=%2Farticles%2Fadd', [
            'email' => 'tom.sugai@example.com',
            'password' => 'ts0521ts',
        ]);
        $this->assertRedirect('/articles');
        $this->assertSession(1, 'Auth.User.id');
    }

    /**
     * ログアウト
     */
    public function testLogout()
    {
        $this->session(['Auth.User.id' => 1]);

        $this->get('/users/logout');

        $this->assertSession([], 'Auth');
        $this->assertRedirect('/users/login');
    }
}