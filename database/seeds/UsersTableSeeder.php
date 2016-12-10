<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 0,
            'parent_id' => 0,
            'name' => 'admin',
            'email' => 'admin@go.cms',
            'password' => bcrypt('passwd')
        ]);
    }
}
