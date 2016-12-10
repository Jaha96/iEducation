<?php

use Illuminate\Database\Seeder;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info')->insert([
            'domain' => 'localhost',
            'name' => '[{"locale":"MN","value":""},{"locale":"EN","value":""}]',
            'is_active' => 1
        ]);
    }
}
