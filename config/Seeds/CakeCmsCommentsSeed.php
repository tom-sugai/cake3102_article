<?php
use Migrations\AbstractSeed;

/**
 * CakeCmsComments seed.
 */
class CakeCmsCommentsSeed extends AbstractSeed
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
                'id' => '98',
                'article_id' => '15',
                'body' => 'good article fine!!',
                'published' => '0',
                'created' => '2022-07-08 07:21:48',
                'modified' => '2022-07-08 07:21:48',
                'contributor' => '',
            ],
            [
                'id' => '99',
                'article_id' => '15',
                'body' => 'i am fine today.',
                'published' => '1',
                'created' => '2022-07-23 11:05:20',
                'modified' => '2022-07-23 11:05:20',
                'contributor' => '',
            ],
            [
                'id' => '101',
                'article_id' => '39',
                'body' => 'add comment to article id 39 ',
                'published' => '1',
                'created' => '2022-07-24 04:36:32',
                'modified' => '2022-07-24 04:36:32',
                'contributor' => '',
            ],
            [
                'id' => '102',
                'article_id' => '40',
                'body' => 'add comment to article id 40',
                'published' => '0',
                'created' => '2022-07-24 04:37:29',
                'modified' => '2022-07-24 04:37:29',
                'contributor' => '',
            ],
            [
                'id' => '103',
                'article_id' => '39',
                'body' => 'add 2nd comment to article id 39',
                'published' => '0',
                'created' => '2022-07-24 04:40:25',
                'modified' => '2022-07-24 04:40:25',
                'contributor' => '',
            ],
            [
                'id' => '104',
                'article_id' => '40',
                'body' => 'add 2nd comment to article id 40',
                'published' => '0',
                'created' => '2022-07-24 04:41:03',
                'modified' => '2022-07-24 04:41:03',
                'contributor' => '',
            ],
            [
                'id' => '105',
                'article_id' => '43',
                'body' => '４回目ワクチン接種終わりました。これで一安心です！',
                'published' => '0',
                'created' => '2022-07-24 05:08:20',
                'modified' => '2022-07-24 05:08:20',
                'contributor' => '',
            ],
            [
                'id' => '107',
                'article_id' => '181',
                'body' => '自分の（tom）のブログに、自分でコメントを記入しました',
                'published' => '0',
                'created' => '2022-07-25 03:06:32',
                'modified' => '2022-07-25 03:06:32',
                'contributor' => '',
            ],
            [
                'id' => '108',
                'article_id' => '19',
                'body' => '啓斗君の投稿にコメントを記入します（じいちゃんより）怪我しないように気をつけてね！',
                'published' => '0',
                'created' => '2022-07-25 03:09:19',
                'modified' => '2022-08-14 10:10:15',
                'contributor' => '',
            ],
            [
                'id' => '113',
                'article_id' => '183',
                'body' => 'コロナウイルス第7波進行中です、病床使用率が６０％を超えてきました',
                'published' => '0',
                'created' => '2022-08-04 05:49:08',
                'modified' => '2022-08-14 10:02:40',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '114',
                'article_id' => '183',
                'body' => '県も市もコロナ対策で大変です、保健所は総動員体制をひいています',
                'published' => '0',
                'created' => '2022-08-04 06:34:46',
                'modified' => '2022-08-14 10:05:15',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '115',
                'article_id' => '183',
                'body' => '来週の火曜日に４回目のワクチン接種ができます、早めに受けられて良かったです',
                'published' => '0',
                'created' => '2022-08-04 06:36:30',
                'modified' => '2022-08-14 10:07:09',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '116',
                'article_id' => '183',
                'body' => '７月も８月もよく飲みました、勢いがついてしまいなかなか止まりません、なんとかしなければいけませんね！ビルーだけにできればいいのですがついつい・・・,やっぱりやめましょうね！',
                'published' => '0',
                'created' => '2022-08-04 06:57:10',
                'modified' => '2022-08-15 04:25:33',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '117',
                'article_id' => '184',
                'body' => 'あなたのプログラムは本当にヘボですね？？？',
                'published' => '0',
                'created' => '2022-08-04 06:59:19',
                'modified' => '2022-08-04 06:59:19',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '118',
                'article_id' => '184',
                'body' => '母さんのプログラムは素晴らしかったですね、僕には才能がないのかな？',
                'published' => '0',
                'created' => '2022-08-04 07:01:47',
                'modified' => '2022-08-04 07:01:47',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '119',
                'article_id' => '18',
                'body' => '今日は一日雨でした。今も雷が激しくなっています。',
                'published' => '0',
                'created' => '2022-08-04 07:31:41',
                'modified' => '2022-08-04 07:31:41',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '120',
                'article_id' => '184',
                'body' => 'review of  Authentication and Authorization
change for redirect url',
                'published' => '0',
                'created' => '2022-08-05 07:22:44',
                'modified' => '2022-08-05 07:22:44',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '121',
                'article_id' => '173',
                'body' => '本当に花巻の翔平ちゃんは頑張ってますね！
おばあちゃんの親戚かもね！',
                'published' => '0',
                'created' => '2022-08-07 06:03:40',
                'modified' => '2022-08-07 06:03:40',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '122',
                'article_id' => '173',
                'body' => '翔平ちゃん大好き！',
                'published' => '0',
                'created' => '2022-08-07 06:34:17',
                'modified' => '2022-08-07 06:34:17',
                'contributor' => 'hana@gmail.com',
            ],
            [
                'id' => '123',
                'article_id' => '18',
                'body' => 'お盆はゆっくりできましたか？何かと大変でしょが、最後までめげずに頑張ってくださいね！ゴールで待っていますよ',
                'published' => '0',
                'created' => '2022-08-14 03:54:15',
                'modified' => '2022-08-14 03:54:15',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '124',
                'article_id' => '184',
                'body' => '漸く形が見えてきました。CakePHPは本当に学習コストの高いフレームワークのようです。反面、しっかりわかっている人が一人いれば爆速開発とレイヤーごとの分業がやりやすそうです。',
                'published' => '0',
                'created' => '2022-08-14 07:45:57',
                'modified' => '2022-08-14 07:45:57',
                'contributor' => 'tom.sugai@gmail.com',
            ],
            [
                'id' => '125',
                'article_id' => '183',
                'body' => 'あんまり飲むと体を壊しますよ！前立腺が腫れ上がって苦しい思いをするのは貴方ですからね！気をつけてくださいね,、出来たー！！',
                'published' => '0',
                'created' => '2022-08-14 10:14:55',
                'modified' => '2022-08-15 12:04:05',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '128',
                'article_id' => '185',
                'body' => '花さんご苦労さんです、いつもお世話になります、感謝です！',
                'published' => '0',
                'created' => '2022-08-15 04:41:34',
                'modified' => '2022-08-15 04:41:34',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '129',
                'article_id' => '184',
                'body' => '慌てないで、よく考えて作ってくださいね',
                'published' => '0',
                'created' => '2022-08-15 04:46:07',
                'modified' => '2022-08-15 04:46:07',
                'contributor' => 'fumiko.sugai@gmail.com',
            ],
            [
                'id' => '130',
                'article_id' => '56',
                'body' => 'コメントのテストです、うまく行きますかね',
                'published' => '0',
                'created' => '2022-08-15 04:57:31',
                'modified' => '2022-08-15 04:57:31',
                'contributor' => 'hana@gmail.com',
            ],
            [
                'id' => '131',
                'article_id' => '56',
                'body' => 'コメント投稿画面のナビゲーション・ブロックを削除しました',
                'published' => '0',
                'created' => '2022-08-15 04:59:50',
                'modified' => '2022-08-15 04:59:50',
                'contributor' => 'hana@gmail.com',
            ],
            [
                'id' => '132',
                'article_id' => '56',
                'body' => 'ナビゲーションの削除、成功です！',
                'published' => '0',
                'created' => '2022-08-15 05:00:30',
                'modified' => '2022-08-15 05:00:30',
                'contributor' => 'hana@gmail.com',
            ],
            [
                'id' => '134',
                'article_id' => '184',
                'body' => '花さんのコメントテストです、やったー！',
                'published' => '0',
                'created' => '2022-08-15 12:06:24',
                'modified' => '2022-08-15 12:06:46',
                'contributor' => 'hana@gmail.com',
            ],
        ];

        $table = $this->table('comments');
        $table->insert($data)->save();
    }
}
