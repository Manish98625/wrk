<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            array('name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1')),
            array('name' => 'super_admin',
                'email' => 'super_admin@gmail.com',
                'password' => Hash::make('1')),
        ]);

    }
}
