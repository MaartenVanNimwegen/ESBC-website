<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'TestUser',
            'email' => 'testuser@email.com',
            'password' => Hash::make('Hoelahoepie5678()'),
            'role' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
