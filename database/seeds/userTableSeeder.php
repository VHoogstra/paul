<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.nl',
            'role' => '3',
            'password' => bcrypt('admin'),
        ]);
        
    }
}
