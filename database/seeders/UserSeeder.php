<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Puskesmas',
            'username' => 'web_admin_matur',
            'password' => Hash::make('web_admin_matur'),
            'level' => 'admin',
            'last_login' => '20-06-2024 11:25:21',
            'manual_token' => '20240620',
        ]);
    }
}
