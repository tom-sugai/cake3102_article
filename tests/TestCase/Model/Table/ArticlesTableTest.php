<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use \Cake\Collection\Collection;

/**
 * App\Model\Table\ArticlesTable Test Case
 */
class ArticlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTable
     */
    public $Articles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Articles',
        'app.Users',
        'app.Comments',
        'app.Tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $this->Articles = TableRegistry::getTableLocator()->get('Articles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Articles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        //$this->markTestIncomplete('Not implemented yet.');
        
        // エラーが無いとき
        $article = $this->Articles->newEntity([
            'title' => str_repeat('a', 10),
            'body' => str_repeat('b', 256),
        ]);
        //debug($article);
        $expected = [];
        $this->assertSame($expected, $article->getErrors());
        
        // 必須項目が空のとき
        $emptyArticle = $this->Articles->newEntity([
            'title' => '',
            'body' => '',
        ]);
        //debug($emptyArticle);
        $expected = [
            'title' => ['_empty' => 'This field cannot be left empty'],
            //'body' => ['_empty' => 'This field cannot be left empty'],
        ];
        $this->assertSame($expected, $emptyArticle->getErrors());
    
        // 文字数が少ないとき
        $lessArticle = $this->Articles->newEntity([
            'title' => str_repeat('a', 9),
            'body' => str_repeat('b', 9),
        ]);
        //debug($lessArticle);
        $expected = [
            'title' => ['minLength' => 'The provided value is invalid'],
            'body' => ['minLength' => 'The provided value is invalid'],
        ];
        //debug($lessArticle->getErrors());
        $this->assertSame($expected, $lessArticle->getErrors());
         
        // 文字数が多いとき
        $moreArticle = $this->Articles->newEntity([
            'title' => str_repeat('a', 256),
            'body' => str_repeat('b', 256),
        ]);
        $expected = [
            'title' => ['maxLength' => 'The provided value is invalid'],
        ];
        //debug($moreArticle);
        $this->assertSame($expected, $moreArticle->getErrors());
    }

    /**
     * articles 追加
     */
    public function testSaveInsert()
    {
        $newArticle = $this->Articles->newEntity([
            'user_id' => 1,
            'title' => 'CakePHP テスト',
            'body' => str_repeat('🍺', 10),
            'tag_string' => 'PHP',
        ]);
        $this->Articles->save($newArticle);
        $article = $this->Articles->get($newArticle->id, [
            'contain' => ['tags'],
        ]);

        // スラグ
        $this->assertSame('CakePHP-tesuto', $article->slug);

        // タグに変換
        $this->assertSame('PHP', $article->tags[0]->title);
    }

    public function testSaveUpdate()
    {
        $article = $this->Articles->get(1);
        $this->assertSame('CakePHP3-chutoriaru', $article->slug);
        $article = $this->Articles->patchEntity($article, [
            'title' => 'CakePHP3 Tutorial',   // changed Japanes to English
        ]);
        $this->Articles->save($article);

        $newArticle = $this->Articles->get(1);

        // title が変わってもスラグは変化しない
        $this->assertSame('CakePHP3 Tutorial', $newArticle->title);
        $this->assertSame('CakePHP3-chutoriaru', $newArticle->slug);
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /** find Article test */
    public function testArticlesTableFind() {
        $result = $this->Articles->find('all')->first();
        $this->assertFalse(empty($result));
        $this->assertTrue(is_a($result,'\App\Model\Entity\Article'));
        $this->assertEquals($result->id,1);
        $this->assertStringStartsWith('CakePHP3 チュートリアル', $result->title);
    }

    public function testFindTagged()
    {
        // タグなし
        $notTaggedArticle = $this->Articles
            ->find('tagged', ['tags' => []])
            ->contain(['Tags'])
            ->first();
        //debug($notTaggedArticle);
        $this->assertEmpty($notTaggedArticle->tags);

        // タグあり
        $taggedArticle = $this->Articles
            ->find('tagged', ['tags' => ['CakePHP']])
            ->contain(['Tags'])
            ->first();
        //debug($taggedArticle);
        $tags = new Collection($taggedArticle->tags);
        $this->assertNotEmpty($tags->filter(function($tag) {
            return $tag->title === 'PHP';
        }));
    }

    
    
}
