<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert([
            'title' => 'Trainingen kerstvakantie',
            'description' => 'Allen, Even enige informatie over de trainingen tijdens de laatste dagen van 2023. Volgende week gaan de trainingen gewoon door. RSG: Geen trainingen op 25 december (eerste kerstdag) en 1 januari nieuwjaarsdag). Eerste training weer op maandag 8 januari. Bogerman: Geen training op dinsdag 26 december (tweede kerstdag). Duinterpenhal: Trainingen gaan gewoon door. Graag ook doorgeven aan jullie leden.',
            'created_at' => '2023-12-16T12:00',
            'updated_at' => '2023-12-16T12:00',
        ]);
        DB::table('news')->insert([
            'title' => 'ALV ESBC Menhir',
            'description' => 'Jaarvergadering basketbalclub ESBC Menhir, 07 december 2023
            Locatie: Eet- en Biercafé 3B Wijde Noorderhorne 2 Sneek Tijd: 20.00 uur Agenda Opening Vaststellen agenda Notulen jaarvergadering; 22 november 2022 Ingekomen stukken Verslag van de voorzitter Verslag van de secretaris Verslag van de wedstrijdsecretaris Verslag van de vertrouwenscontactpersoon Financieel jaarverslag Verslag kascommissie Contributieverhoging m.i.v. seizoen 2024-2025 Begroting seizoen 2022-2023 Bestuursverkiezing: Aftredend, niet herkiesbaar: Jeroen Zantingh Vacature: secretaris Eventuele kandidaten kunnen zich, tot 24 uur voor de vergadering, melden bij de secretaris; secretaris@esbcmenhir.nl Benoeming commissies Rondvraag Sluiting rond 21.30 uur',
            'created_at' => '2023-11-26T12:00',
            'updated_at' => '2023-11-26T12:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Training 6 november',
            'description' => 'Maandag 6 november vervallen de trainingen in de RSG. Dit in verband met de eerste toetsweek van de RSG.',
            'created_at' => '2023-10-18T12:00',
            'updated_at' => '2023-10-18T12:00',
        ]);
        DB::table('news')->insert([
            'title' => 'Seizoen 2023/2024',
            'description' => 'In onderstaand nieuws bericht vinden jullie alle informatie met betrekking tot het seizoen 2023/2024. Trainingen De trainingen starten weer vanaf woensdag 6 september 2023. De trainingstijden inclusief de namen van de trainers zijn terug te vinden middels deze link. Teamindeling In onderstaande tabel is de teamindeling voor het seizoen 2023/24 te zien. De groen gekleurde cellen zijn de recreanten binnen de jeugdteams. Mocht het zo zijn dat je je naam mist, stuur dan een mail naar wedstrijdsecretaris@esbcmenhir.nl. De wedstrijdsecretaris zal dan kijken waar het fout gegaan is.',
            'created_at' => '2023-08-21T12:00',
            'updated_at' => '2023-08-21T12:00',
        ]);
    }
}
