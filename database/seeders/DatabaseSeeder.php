<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SponsorSeeder::class,
            NewsSeeder::class,
            AdminSeeder::class,
            Teams::class,
            TrainingSeeder::class,
        ]);
    }
}
