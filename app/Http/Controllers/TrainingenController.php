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
                'start' => 'required|string|max:5',
                'end' => 'required|string|max:5',
                'trainer' => 'required|string|min:5|max:255'
            ],
            [
                'team.required' => 'Een team is verplicht!',
                'team.integer' => 'Je moet een team ID invullen!',
                'team.min' => 'Team ID moet worden gegeven!',
                'team.max' => 'Het team ID kan niet langer dan 11 karakters zijn!',
                'day.required' => 'Een dag is verplicht!',
                'day.integer' => 'Je moet een dag nummer ingeven!',
                'day.min' => 'Het dag nummer moet worden ingeven!',
                'day.max' => 'Het dag nummer kan max 11 karakters zijn!',
                'start.required' => 'Een start tijd is verplicht!',
                'start.string' => 'De start tijd is onjuist!',
                'start.max' => 'De start tijd is te lang!',
                'end.required' => 'Een eind tijd is verplicht!',
                'end.string' => 'De eind tijd is onjuist!',
                'end.max' => 'De eind tijd is te lang!',
                'trainer.required' => 'De trainer is verplicht!',
                'trainer.string' => 'De trainer is onjuist!',
                'trainer.min' => 'De naam van de trainer is te kort!',
                'trainer.max' => 'De naam van de trainer is te lang!',
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
                'team' => 'required|integer|min:1|max:11',
                'day' => 'required|integer|min:1|max:11',
                'start' => 'required|string|max:5',
                'end' => 'required|string|max:5',
                'trainer' => 'required|string|min:5|max:255'
            ],
            [
                'team.required' => 'Een team is verplicht!',
                'team.integer' => 'Je moet een team ID invullen!',
                'team.min' => 'Team ID moet worden gegeven!',
                'team.max' => 'Het team ID kan niet langer dan 11 karakters zijn!',
                'day.required' => 'Een dag is verplicht!',
                'day.integer' => 'Je moet een dag nummer ingeven!',
                'day.min' => 'Het dag nummer moet worden ingeven!',
                'day.max' => 'Het dag nummer kan max 11 karakters zijn!',
                'start.required' => 'Een start tijd is verplicht!',
                'start.string' => 'De start tijd is onjuist!',
                'start.max' => 'De start tijd is te lang!',
                'end.required' => 'Een eind tijd is verplicht!',
                'end.string' => 'De eind tijd is onjuist!',
                'end.max' => 'De eind tijd is te lang!',
                'trainer.required' => 'De trainer is verplicht!',
                'trainer.string' => 'De trainer is onjuist!',
                'trainer.min' => 'De naam van de trainer is te kort!',
                'trainer.max' => 'De naam van de trainer is te lang!',
            ]
        );


        if (request()->has('picture')) {
            $picturePath = request()->file('picture')->store('images/sponsors', 'public');
            $validated['picture'] = $picturePath;
        }

        $training = new Training();
        $training->team_id = $validated['team'];
        $training->day = $validated['day'];
        $training->start = $validated['start'];
        $training->end = $validated['end'];
        $training->trainer = $validated['trainer'];
        $training->save();

        return redirect()->back()->with('success', 'De training is succesvol toegevoegd!');
    }
}
