<?php namespace OrmBg\UserManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'um_roles' )->insert([
            'id'            => 1,
            'name'          => 'Admin',
            'display_name'  => 'Admin',
            'description'   => '',
            'created_at'    => time(),
            'updated_at'    => time()
        ]);
        
        DB::table( 'um_users' )->insert([
            'id'            => 1,
            'name'          => 'Admin',
            'last_name'     => 'Admin',
            'email'         => 'admin@example.com',
            'username'      => 'admin',
            'password'      => '$2y$10$8/dpleGVwrZO5y5irAYlDunZCArPTSsAxjQLDFuW5EUyPK1UuGTgO', // admin
            'active'        => 1,
            'created_at'    => time(),
            'updated_at'    => time()
        ]);

        DB::table( 'um_users_roles' )->insert([
            'user_id'   => 1,
            'role_id'   => 1
        ]);
    }
}
