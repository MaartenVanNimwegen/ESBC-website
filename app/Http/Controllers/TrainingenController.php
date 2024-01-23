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

    public function delete($id)
    {
        $training = Training::find($id);
        if ($training) {
            $training->delete();
            return redirect()->back()->with('success', 'De training is succesvol verwijderd');
        }

        return redirect()->back()->with('error', 'De training is niet gevonden of kon niet worden verwijderd');
    }

    public function update($id)
    {
        $validated = request()->validate(
            [
                'team' => 'required|integer|min:1|max:11',
                'day' => 'required|integer|min:1|max:11',
                'start' => 'required|string|max:12',
                'end' => 'required|string|max:12',
                'trainer' => 'required|string|min:5|max:255'
            ],
            [

            ]
        );

        $training = Training::find($id);
        if ($training) {
            $training->team_id = $validated['team'];
            $training->day = $validated['day'];
            $training->start = $validated['start'];
            $training->end = $validated['end'];
            $training->trainer = $validated['trainer'];
            $training->save();
            return redirect()->back()->with('success', 'De training is succesvol gewijzigd!');
        }
        return redirect()->back()->with('error', 'De training is niet gevonden of kon niet worden gewijzigd!');
    }

    public function add()
    {
        $validated = request()->validate(
            [
                'name' => 'required|string|min:3|max:255',
                'picture' => 'image|required',
                'url' => 'required|url|min:8|max:255'
            ],
            [
                'name.required' => 'De naam van de sponsor is verplicht!',
                'name.string' => 'De naam van de sponsor is van een verkeerd type!',
                'name.min' => 'De naam van de sponsor is te kort!',
                'name.max' => 'De naam van de sponsor is te lang!',
                'picture.image' => 'Het logo van de sponsor moet van het type: jpeg, jpg, png of gif zijn!',
                'picture.required' => 'Het logo van de sponsor is verplicht!',
                'url.required' => 'De url van de sponsor is verplicht!',
                'url.url' => 'De url van de sponsor is onjuist!',
                'url.min' => 'De url van de sponsor is te kort!',
                'url.max' => 'De url van de sponsor is te lang!',
            ]
        );


        if (request()->has('picture')) {
            $picturePath = request()->file('picture')->store('images/sponsors', 'public');
            $validated['picture'] = $picturePath;
        }

        $sponsor = new Sponsor();
        $sponsor->title = $validated['name'];
        $sponsor->picture_location = $validated['picture'];
        $sponsor->url = $validated['url'];
        $sponsor->save();

        return redirect()->back()->with('success', 'De sponsor is succesvol toegevoegd!');
    }
}
