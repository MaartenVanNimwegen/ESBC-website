<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sponsor')->insert([
            'title' => 'de Stolp',
            'picture_location' => 'images/sponsors/de-stolp.webp',
            'created_at' => now(),
            'updated_at' => now(),
            'url' => 'https://www.destolpsneek.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Garage Betten',
            'picture_location' => 'images/sponsors/garage-betten.webp',
            'created_at' => now(),
            'updated_at' => now(),
            'url' => 'https://betten-sneek.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Schadecentrul Sluyter',
            'picture_location' => 'images/sponsors/schade-centrum.webp',
            'created_at' => now(),
            'updated_at' => now(),
            'url' => 'https://sluyterautoschade.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Sluyter Schilderwerk',
            'picture_location' => 'images/sponsors/schilder-sluyter.webp',
            'created_at' => now(),
            'updated_at' => now(),
            'url' => 'https://sluytersneek.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Sponsorkliks',
            'picture_location' => 'images/sponsors/sponsor-kliks.webp',
            'created_at' => now(),
            'updated_at' => now(),
            'url' => 'https://www.sponsorkliks.com/products/shops.php?club=3968&cn=nl&ln=nl',
        ]);
    }
}
