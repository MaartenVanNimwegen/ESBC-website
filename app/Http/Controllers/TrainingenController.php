<?php

namespace App\Http\Controllers;

use App\Enums\DayOfWeek;
use App\Models\Training;

class TrainingenController extends Controller
{
    public function viewTrainingen()
    {
        $trainingenMaandag = Training::with('team')->where('day', 1)->get();
        $trainingenDinsdag = Training::with('team')->where('day', 2)->get();
        $trainingenWoensdag = Training::with('team')->where('day', 3)->get();
        $trainingenDonderdag = Training::with('team')->where('day', 4)->get();
        $trainingenVrijdag = Training::with('team')->where('day', 5)->get();
        $trainingenZaterdag = Training::with('team')->where('day', 6)->get();
        $trainingenZondag = Training::with('team')->where('day', 7)->get();

        return view('trainingen', [
            'maandag' => $trainingenMaandag,
            'dinsdag' => $trainingenDinsdag,
            'woensdag' => $trainingenWoensdag,
            'donderdag' => $trainingenDonderdag,
            'vrijdag' => $trainingenVrijdag,
            'zaterdag' => $trainingenZaterdag,
            'zondag' => $trainingenZondag,
        ]);
    }

}
