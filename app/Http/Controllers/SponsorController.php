<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function delete($id)
    {
        $sponsor = Sponsor::find($id);
        if ($sponsor) {
            Storage::disk('public')->delete($sponsor->picture_location);
            $sponsor->delete();
            return redirect()->back()->with('success', 'De sponsor is succesvol verwijderd');
        }

        return redirect()->back()->with('error', 'De sponsor is niet gevonden of kon niet worden verwijderd');
    }

    public function update($id)
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

        $sponsor = Sponsor::find($id);
        if ($sponsor) {
            if (request()->has('picture')) {
                $picturePath = request()->file('picture')->store('images/sponsors', 'public');
                $validated['picture'] = $picturePath;
                $sponsor->title = $validated['name'];
                $sponsor->picture_location = $validated['picture'];
                $sponsor->url = $validated['url'];
                $sponsor->save();
                return redirect()->back()->with('success', 'De sponsor is succesvol gewijzigd!');
            }
        }
        return redirect()->back()->with('error', 'De sponsor is niet gevonden of kon niet worden gewijzigd!');
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
