<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Signup;

class InschrijfController extends Controller
{
    public function Signup(Request $request)
    {
        $validator = Validator::make(
            $request->input(),
            [
                'NLvoornaam' => ['required', 'max:128', 'string'],
                'NLachternaam' => ['required', 'max:128', 'string'],
                
                'NLemail' => ['required', 'max:255', 'email'],
                'NLemailOudersVoogd' => ['required', 'max:255', 'string'],
                'NLpostcode' => ['required', 'max:6', 'min:6', 'string'],
                'NLhuisnummer' => ['required', 'max:5', 'string'],
                'NLgeboortedatum' => ['required', 'max:50', 'date'],
                'NLgeslacht' => ['required', 'max:1', 'integer'],
                'NLtelefoonnummer' => ['required', 'max:10', 'min:10', 'integer'],
                'RHvoorletterachternaam' => ['required', 'max:255', 'string'],
                'RHiban' => ['required', 'max:34', 'string'],
                'RHtelefoon' => ['required', 'max:10', 'integer'],
                'RHemail' => ['required', 'max:255', 'email'],
                'RHtype' => ['required', 'max:1', 'int'],
                'RHpasfoto' => ['required', 'image'],
                'functies' => ['required', 'max:2', 'integer'],
            ],
            [
                'NLvoornaam.required' => 'De voornaam van het nieuwe lid is verplicht!',
                'NLvoornaam.max' => 'De voornaam van het nieuwe lid is te lang! Gebruik maximaal 128 karakters.',
                'NLvoornaam.string' => 'De voornaam van het nieuwe lid is van een ongeldig type!',
                'NLachternaam.required' => 'De achternaam van het nieuwe lid is verplicht!',
                'NLachternaam.max' => 'De achternaam van het nieuwe lid is te lang! Gebruik maximaal 128 karakters.',
                'NLachternaam.string' => 'De achternaam van het nieuwe lid is van een ongeldig type!',
                
                'NLemail.required' => 'Het e-mailadres van het nieuwe lid is verplicht!',
                'NLemailOudersVoogd' => '',
                'NLpostcode' => '',
                'NLhuisnummer' => '',
                'NLgeboortedatum' => '',
                'NLgeslacht' => '',
                'NLtelefoonnummer' => '',
                'RHvoorletterachternaam' => '',
                'RHiban' => '',
                'RHtelefoon' => '',
                'RHemail' => '',
                'RHtype' => '',
                'RHpasfoto' => '',
                'functies' => '',

            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $signupModel = new Signup;

        $signupModel->save();
    }
}
