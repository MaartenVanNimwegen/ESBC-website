<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Teams extends Seeder
{
    public function run(): void
    {
        DB::table('teams')->insert([
            'name' => 'Onder 12',
            'plg_ID' => 8996,
            'cmp_ID' => 3349,
            'picture_location' => 'images/teams/Kind.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teams')->insert([
            'name' => 'Onder 14',
            'plg_ID' => 13103,
            'cmp_ID' => 3615,
            'picture_location' => 'images/teams/Groep_Jong.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teams')->insert([
            'name' => 'Onder 16 1',
            'plg_ID' => 3772,
            'cmp_ID' => 3329,
            'picture_location' => 'images/teams/Groep_Oud.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teams')->insert([
            'name' => 'Onder 16 2',
            'plg_ID' => 3773,
            'cmp_ID' => 1701,
            'picture_location' => 'images/teams/Groep_Oud.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teams')->insert([
            'name' => 'Onder 20',
            'plg_ID' => 13103,
            'cmp_ID' => 3335,
            'picture_location' => 'images/teams/Actie.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('teams')->insert([
            'name' => 'Heren 1',
            'plg_ID' => 3700,
            'cmp_ID' => 2528,
            'picture_location' => 'images/teams/Shot.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
