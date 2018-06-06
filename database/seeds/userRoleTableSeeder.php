<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'name' => 'guest',
        ]);
        DB::table('user_roles')->insert([
            'name' => 'user',
        ]);
        DB::table('user_roles')->insert([
            'name' => 'admin',
        ]);
    }
}
