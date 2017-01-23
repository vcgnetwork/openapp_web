<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'user_id' => 1,
            'city' => 'Wesley Chapel',
            'state' => 'FL',
            'zipcode' => '33544',
            'created_at' => '2017-01-01 00:00:00'
        ]);
    }
}
