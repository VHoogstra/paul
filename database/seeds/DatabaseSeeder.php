<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userRoleTableSeeder::class);
        $this->call(userTableSeeder::class);
        $this->call(studentSeeder::class);
        $this->call(settingsSeeder::class);
    }
}
