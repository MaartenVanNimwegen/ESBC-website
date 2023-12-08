<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder {
    public function run(): void {
        DB::table('sponsor')->insert([
            'title' => 'Karwei',
            'picture_location' => 'storage/images/karwei.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Gamma',
            'picture_location' => 'storage/images/gamma.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Action',
            'picture_location' => 'storage/images/action.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Hema',
            'picture_location' => 'storage/images/hema.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Kruitvat',
            'picture_location' => 'storage/images/kruitvat.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Etos',
            'picture_location' => 'storage/images/etos.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
