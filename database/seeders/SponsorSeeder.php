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
            'picture_location' => 'storage/images/sponsors/de-stolp.png',
            'created_at' => now(),
            'updated_at' => now(),
            'link' => 'https://www.destolpsneek.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Garage Betten',
            'picture_location' => 'storage/images/sponsors/Garage-Betten_JPG-test.png',
            'created_at' => now(),
            'updated_at' => now(),
            'link' => 'https://betten-sneek.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Schadecentrul Sluyter',
            'picture_location' => 'storage/images/sponsors/schadecentrum-sluyter-1.png',
            'created_at' => now(),
            'updated_at' => now(),
            'link' => 'https://sluyterautoschade.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Sluyter Schilderwerk',
            'picture_location' => 'storage/images/sponsors/sluyter-schilderwerk.png',
            'created_at' => now(),
            'updated_at' => now(),
            'link' => 'https://sluytersneek.nl/',
        ]);
        DB::table('sponsor')->insert([
            'title' => 'Sponsorkliks',
            'picture_location' => 'storage/images/sponsors/sponsor-sponsorkliks.png',
            'created_at' => now(),
            'updated_at' => now(),
            'link' => 'https://www.sponsorkliks.com/products/shops.php?club=3968&cn=nl&ln=nl',
        ]);
    }
}
