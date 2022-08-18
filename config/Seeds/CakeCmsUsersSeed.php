<?php
use Migrations\AbstractSeed;

/**
 * CakeCmsUsers seed.
 */
class CakeCmsUsersSeed extends AbstractSeed
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
                'id' => '5',
                'email' => 'tom.sugai@gmail.com',
                'password' => '$2y$10$v1dC0AXye7cUzApbrg8Rf.JPaYxcD45g/oWl8EJA1wPs7hLfgJvRy',
                'created' => '2021-02-21 05:15:50',
                'modified' => '2022-07-08 05:59:45',
                'role' => 'admin',
            ],
            [
                'id' => '6',
                'email' => 'junji.sugai@gmail.com',
                'password' => '$2y$10$IUVgxo79DmXIIF6YG/LkeeDGI4jAcbFirY.zL3umbIYLaaQ8mq8ru',
                'created' => '2021-02-21 05:17:00',
                'modified' => '2022-07-08 07:50:13',
                'role' => '',
            ],
            [
                'id' => '7',
                'email' => 'fumiko.sugai@gmail.com',
                'password' => '$2y$10$/TgerC2nh2/PNEPij1LmreuoHxuYdqCjywfwBEi49zIzBR/XCYFVy',
                'created' => '2021-02-21 05:17:22',
                'modified' => '2022-08-07 03:44:06',
                'role' => 'author',
            ],
            [
                'id' => '8',
                'email' => 'keito@gmail.com',
                'password' => '$2y$10$exkVH1QlwMLloXCUE0FFQ.NeeN8Ra8rcHMMNuE0zRim2fZU3EJlli',
                'created' => '2021-02-21 06:03:12',
                'modified' => '2022-07-08 06:00:37',
                'role' => '',
            ],
            [
                'id' => '9',
                'email' => 'seiichi@gmail.com',
                'password' => '$2y$10$orI59OawddzcMVUjtvBjd.AaOMwMs4KGNrYb6ISsDq8S4KvKHIhWq',
                'created' => '2021-02-21 07:08:48',
                'modified' => '2022-07-08 06:00:52',
                'role' => '',
            ],
            [
                'id' => '11',
                'email' => 'taro@gmail.com',
                'password' => '$2y$10$W0iiMEk7paGJR2MHACdqge1obwESl3/2/OGsMm8W2zKrI8wthY9QS',
                'created' => '2021-02-26 01:39:41',
                'modified' => '2022-07-08 06:01:11',
                'role' => '',
            ],
            [
                'id' => '15',
                'email' => 'hana@gmail.com',
                'password' => '$2y$10$psdGLqiHcpseSv/moBVcR.5I6GVZhLfLobj3gpMN6XDxqYgbphZYq',
                'created' => '2022-08-07 06:11:19',
                'modified' => '2022-08-07 06:12:51',
                'role' => 'author',
            ],
            [
                'id' => '17',
                'email' => 'ben.sugai@gmail.com',
                'password' => '$2y$10$7hsoY7MIP4.OAYuFrca3kuNW7VnOVT19WlJQyNzDDqHTqEGLvIB6K',
                'created' => '2022-08-08 05:43:55',
                'modified' => '2022-08-08 05:43:55',
                'role' => 'author',
            ],
            [
                'id' => '18',
                'email' => 'hogy.sugai@gmail.com',
                'password' => '$2y$10$TMPt7joDK6OmxLUKEo82vu4BS117HzLnE/iAM.3Nz.ye3xtBVk.qq',
                'created' => '2022-08-08 05:48:02',
                'modified' => '2022-08-08 05:48:02',
                'role' => 'author',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
