<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('trainingen')->insert([
            'team_id' => 2,
            'day' => 1,
            'start' => '18:30',
            'end' => '19:30',
            'trainer' => 'Danny IJsselstein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 4,
            'day' => 1,
            'start' => '18:30',
            'end' => '19:30',
            'trainer' => 'Gerlof Velthuis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 3,
            'day' => 1,
            'start' => '19:30',
            'end' => '20:30',
            'trainer' => 'Jan Weerts',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 5,
            'day' => 1,
            'start' => '19:30',
            'end' => '20:30',
            'trainer' => 'Wouter Kruis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 6,
            'day' => 1,
            'start' => '20:30',
            'end' => '21:30',
            'trainer' => 'Arnold van der Meulen',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trainingen')->insert([
            'team_id' => 1,
            'day' => 2,
            'start' => '18:00',
            'end' => '19:00',
            'trainer' => 'Doede de Vries',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trainingen')->insert([
            'team_id' => 2,
            'day' => 3,
            'start' => '19:30',
            'end' => '20:30',
            'trainer' => 'Danny IJsselstein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 4,
            'day' => 3,
            'start' => '19:30',
            'end' => '20:30',
            'trainer' => 'Linda Potma en Julio Peres',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 3,
            'day' => 3,
            'start' => '19:30',
            'end' => '20:30',
            'trainer' => 'Jan Weerts',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 5,
            'day' => 3,
            'start' => '20:30',
            'end' => '21:30',
            'trainer' => 'Wouter Kruis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('trainingen')->insert([
            'team_id' => 6,
            'day' => 3,
            'start' => '20:30',
            'end' => '21:30',
            'trainer' => 'Arnold van der Meulen',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('trainingen')->insert([
            'team_id' => 1,
            'day' => 4,
            'start' => '18:00',
            'end' => '19:00',
            'trainer' => 'Doede de Vries',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
