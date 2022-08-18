<?php
use Migrations\AbstractSeed;

/**
 * CakeCmsArticlesTags seed.
 */
class CakeCmsArticlesTagsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'article_id' => '15',
                'tag_id' => '43',
            ],
            [
                'article_id' => '15',
                'tag_id' => '44',
            ],
            [
                'article_id' => '18',
                'tag_id' => '99',
            ],
            [
                'article_id' => '18',
                'tag_id' => '100',
            ],
            [
                'article_id' => '19',
                'tag_id' => '47',
            ],
            [
                'article_id' => '39',
                'tag_id' => '33',
            ],
            [
                'article_id' => '39',
                'tag_id' => '90',
            ],
            [
                'article_id' => '39',
                'tag_id' => '91',
            ],
            [
                'article_id' => '40',
                'tag_id' => '86',
            ],
            [
                'article_id' => '40',
                'tag_id' => '90',
            ],
            [
                'article_id' => '40',
                'tag_id' => '91',
            ],
            [
                'article_id' => '41',
                'tag_id' => '87',
            ],
            [
                'article_id' => '41',
                'tag_id' => '95',
            ],
            [
                'article_id' => '41',
                'tag_id' => '96',
            ],
            [
                'article_id' => '43',
                'tag_id' => '92',
            ],
            [
                'article_id' => '43',
                'tag_id' => '93',
            ],
            [
                'article_id' => '43',
                'tag_id' => '94',
            ],
            [
                'article_id' => '46',
                'tag_id' => '97',
            ],
            [
                'article_id' => '48',
                'tag_id' => '83',
            ],
            [
                'article_id' => '48',
                'tag_id' => '87',
            ],
            [
                'article_id' => '48',
                'tag_id' => '98',
            ],
            [
                'article_id' => '94',
                'tag_id' => '9',
            ],
            [
                'article_id' => '94',
                'tag_id' => '34',
            ],
            [
                'article_id' => '94',
                'tag_id' => '35',
            ],
            [
                'article_id' => '173',
                'tag_id' => '88',
            ],
            [
                'article_id' => '177',
                'tag_id' => '89',
            ],
        ];

        $table = $this->table('articles_tags');
        $table->insert($data)->save();
    }
}
