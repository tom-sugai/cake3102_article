<?php
use Migrations\AbstractSeed;

/**
 * CakeCmsPhinxlog seed.
 */
class CakeCmsPhinxlogSeed extends AbstractSeed
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
                'version' => '20220719063509',
                'migration_name' => 'AddRoleToUsers',
                'start_time' => '2022-07-18 21:38:11',
                'end_time' => '2022-07-18 21:38:11',
                'breakpoint' => '0',
            ],
            [
                'version' => '20220719101453',
                'migration_name' => 'Migrate',
                'start_time' => '2022-08-03 17:44:13',
                'end_time' => '2022-08-03 17:44:13',
                'breakpoint' => '0',
            ],
            [
                'version' => '20220804021230',
                'migration_name' => 'AddContributorToComments',
                'start_time' => '2022-08-17 20:09:33',
                'end_time' => '2022-08-17 20:09:33',
                'breakpoint' => '0',
            ],
            [
                'version' => '20220818044848',
                'migration_name' => 'Initial',
                'start_time' => '2022-08-17 19:48:49',
                'end_time' => '2022-08-17 19:48:49',
                'breakpoint' => '0',
            ],
        ];

        $table = $this->table('phinxlog');
        $table->insert($data)->save();
    }
}
