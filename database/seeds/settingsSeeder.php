<?php

use Illuminate\Database\Seeder;

class settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => "photoYear",
            'value' => '17-18',
        ],[
            'name' => "drinkingAge",
            'value' => '18',
        ],[
            'name' => "photoExtension",
            'value' => 'jpg',
        ]);
    }
}
