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