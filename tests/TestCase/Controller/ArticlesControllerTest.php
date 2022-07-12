<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ArticlesController Test Case
 */
class ArticlesControllerTest extends IntegrationTestCase
{
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Articles',
        'app.Tags',
        'app.ArticlesTags',
        'app.Users'
    ];
    public function test記事一覧を表示()
    {
        $this->get('/articles');
        $this->assertResponseOk();
        $this->assertResponseContains('CakePHP3 チュートリアル');
        $this->assertResponseContains('Happy new year');
    }

    /**
     * Test view method
     *
     * @return void
     */
    //public function testView()
    public function test記事詳細ページを表示()
    {
        $this->markTestIncomplete('Not implemented yet.');
        $this->get('/articles/view/CakePHP3-chutoriaru');

        $this->assertResponseOk();
        $this->assertResponseContains('CakePHP3 チュートリアル'); // title
        $this->assertResponseContains('このチュートリアルは簡単な ' .
            'CMS アプリケーションを作ります。'); // body
    }

    public function test記事詳細ページが存在しない()
    {
        $this->get('/articles/view/Happy-birthday');

        $this->assertResponseCode(500);  // origin : 404
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function test記事追加ページにアクセスできる()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/articles/add');

        $this->assertResponseOk();
        //$this->assertResponseContains('記事の追加');
    }

    public function test記事が追加されると記事一覧にリダイレクトする()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/add', [
            'title' => 'Nintendo Switch を購入！',
            'body' => 'クリスマスプレゼントとして買った',
            'tag_string' => 'game,2017',
        ]);
        $this->assertSession('The article has been saved.', 'Flash.flash.0.message');
        $this->assertRedirect('/articles');

        $this->get('/articles');
        $this->assertResponseContains('Nintendo Switch を購入！');
    }

    public function testバリデーションエラーだと追加できずエラーメッセージが表示される()
    {
        $this->enableCsrfToken();
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/add', [
            'title' => 'Nintendo Switch を購入！',
            'body' => '',
            'tag_string' => '',
        ]);

        //$this->assertResponseOk();
        $this->assertResponseCode(302);
        $this->assertResponseContains('The article could not be saved.');

        $this->get('/articles');
        $this->assertResponseNotContains('Nintendo Switch を購入！');
    }

    public function test記事編集ページにアクセスできる()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/articles/edit/CakePHP3-chutoriaru');

        $this->assertResponseContains('記事の編集');
        $this->assertResponseContains('CakePHP3 チュートリアル');
    }

    public function test記事を更新し記事一覧にリダイレクトする()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/edit/CakePHP3-chutoriaru', [
            // タイトルを変更する
            'title' => '1時間で分かるCakePHP3 チュートリアル',
            'body' => 'このチュートリアルは簡単な CMS アプリケーションを作ります。 はじめに CakePHP のインストールを行い、データベースの作成、 そしてアプリケーションを素早く仕上げるための CakePHP が提供するツールを使います。',
            'tag_string' => 'PHP,CakePHP',
        ]);
        $this->assertRedirect('/articles');
        $this->assertSession('Your article has been updated.', 'Flash.flash.0.message');

        $this->get('/articles');
        $this->assertResponseContains('1時間で分かるCakePHP3 チュートリアル');
    }

    public function testバリデーションエラーだと更新できずエラーメッセージが表示される()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/edit/CakePHP3-chutoriaru', [
            // タイトルを変更する
            'title' => '1時間で分かるCakePHP3 チュートリアル',
            'body' => '',
        ]);
        $this->assertResponseOk();
        $this->assertResponseContains('Unable to update your article.');

        $this->get('/articles');
        $this->assertResponseNotContains('1時間で分かるCakePHP3 チュートリアル');
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
    /**
     * Test tags method
     *
     * @return void
     */
    public function testTags()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}