<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => "user$i",
                'email' => "user$i@mail.com",
                'password' => Hash::make('12345678')
            ]);
        }
    }
}
