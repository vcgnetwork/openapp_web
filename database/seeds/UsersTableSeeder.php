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
            'id' => 1,
            'full_name' => 'Web Master',
            'email' => 'admin@openapp.online',
            'password' => Hash::make('weather'),
            'is_active' => 1,
            'created_at' => '2017-01-01 00:00:00'
        ]);
    }
}
