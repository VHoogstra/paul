<?php

use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
          DB::table('students')->insert([
            'stamnr' => 8101944+$i,
            'class' => 'user',
            'first_name' => str_random(10),
            'middle_name' => str_random(10),
            'last_name' => str_random(10),
            'adres' => str_random(10),
            'postalcode' => str_random(6),
            'town' => 'amsterdam',
            'phone_number' => '06'.rand(00000000, 99999999),
            'birth_date' => '1998-02-22',
        ]);  
        }
    }
}
