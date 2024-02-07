<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Signup;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupMail;
use Illuminate\Support\Facades\Log;

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
                'NLemailOudersVoogd' => ['required', 'max:255', 'email'],
                'NLpostcode' => ['required', 'max:6', 'min:6', 'string'],
                'NLhuisnummer' => ['required', 'max:5', 'integer'],
                'NLgeboortedatum' => ['required', 'max:50', 'date'],
                'NLgeslacht' => ['required', 'max:1', 'integer'],
                'NLtelefoonnummer' => ['required', 'min:8', 'max:10', 'regex:/^[0-9]{10}$/'],
                'RHvoorletterachternaam' => ['required', 'max:255', 'string'],
                'RHiban' => ['required', 'max:34', 'string'],
                'RHtelefoon' => ['required', 'min:8', 'max:10', 'regex:/^[0-9]{10}$/'],
                'RHemail' => ['required', 'max:255', 'email'],
                'type' => ['required', 'max:1', 'integer'],
                'bestuur' => ['max:2', 'string'],
                'activiteiten' => ['max:2', 'string'],
                'trainer' => ['max:2', 'string'],
                'coach' => ['max:2', 'string'],
                'scheidsrechter' => ['max:2', 'string'],
                'teammanager' => ['max:2', 'string'],
                'jeugdlidonder14' => ['max:2', 'string'],
            ],
            [
                'NLvoornaam.required' => 'De voornaam van het nieuwe lid is verplicht!',
                'NLvoornaam.max' => 'De voornaam van het nieuwe lid is te lang! Gebruik maximaal 128 karakters.',
                'NLvoornaam.string' => 'De voornaam van het nieuwe lid is van een ongeldig type!',
                'NLachternaam.required' => 'De achternaam van het nieuwe lid is verplicht!',
                'NLachternaam.max' => 'De achternaam van het nieuwe lid is te lang! Gebruik maximaal 128 karakters.',
                'NLachternaam.string' => 'De achternaam van het nieuwe lid is van een ongeldig type!',
                'NLemail.required' => 'Het e-mailadres van het nieuwe lid is verplicht!',
                'NLemail.max' => 'Het e-mailadres van het nieuwe lid is te lang! Gebruik maximaal 255 karakters.',
                'NLemail.email' => 'Het e-mailadres van het nieuwe moet een geldig e-mailadres zijn!',
                'NLemailOudersVoogd.required' => 'Het e-mailadres van de ouders/voogd is verplicht!',
                'NLemailOudersVoogd.max' => 'Het e-mailadres van de ouders/voogd is te lang! Gebruik maximaal 255 karakters.',
                'NLemailOudersVoogd.email' => 'Het e-mailadres van de ouders/voogd moet een geldig e-mailadres zijn!',
                'NLpostcode.required' => 'De postcode is verplicht!',
                'NLpostcode.min' => 'De postcode moet minimaal 6 karakters zijn!',
                'NLpostcode.max' => 'De postcode mag maximaal 6 karakters zijn!',
                'NLpostcode.string' => 'De postcode is van een ongeldig type!',
                'NLhuisnummer.required' => 'Het huisnummer is verplicht!',
                'NLhuisnummer.max' => 'Het huisnummer is te lang! Gebruik maximaal 5 karakters.',
                'NLhuisnummer.integer' => 'Het huisnummer is van een ongeldig type!',
                'NLgeboortedatum.required' => 'De geboortedatum is verplicht!',
                'NLgeboortedatum.max' => 'De geboortedatum is te lang! Gebruik maximaal 50 karakters.',
                'NLgeboortedatum.string' => 'De geboortedatum is verplicht!',
                'NLgeslacht.required' => 'Het geslacht is verplicht!',
                'NLgeslacht.max' => 'Het gekozen geslacht bevat te veel karakters! Gebruik maximaal 1 karakter!',
                'NLgeslacht.integer' => 'Het geslacht is van een ongeldig type!',
                'NLtelefoonnummer.required' => 'Het telefoonnummer is verplicht!',
                'NLtelefoonnummer.min' => 'Het telefoonnummer is te kort! Gebruik minimaal 8 karakters.',
                'NLtelefoonnummer.max' => 'Het telefoonnummer is te lang! Gebruik maximaal 10 karakters.',
                'NLtelefoonnummer.regex' => 'Het telefoonnummer is niet van het goede type!',
                'RHvoorletterachternaam.required' => 'De voorletter en achternaam van de rekeninghouder is verplicht!',
                'RHvoorletterachternaam.max' => 'De voorletter en achternaam van de rekeninghouder is te lang! Gebruik maximaal 255 karakters.',
                'RHvoorletterachternaam.string' => 'De voorletter en achternaam van de rekeninghouder is van het verkeerde type!',
                'RHiban.required' => 'Het IBAN nummer is verplicht!',
                'RHiban.max' => 'Het IBAN nummer is te lang! Gebruik maximaal 34 karakters.',
                'RHiban.string' => 'Het IBAN nummer is van een verkeerd type!',
                'RHtelefoon.required' => 'Het telefoonnummer is verplicht!',
                'RHtelefoon.min' => 'Het telefoonnummer is te kort! Gebruik minimaal 8 karakters.',
                'RHtelefoon.max' => 'Het telefoonnummer is te lang! Gebruik maximaal 10 karakters.',
                'RHtelefoon.regex' => 'Het telefoonnummer is niet van het goede type!',
                'RHemail.required' => 'Het e-mailadres van de rekeninghouder is verplicht!',
                'RHemail.max' => 'Het e-mailadres van de rekeninghouder is te lang! Gebruik maximaal 255 karakters.',
                'RHemail.email' => 'Het e-mailadres van de rekeninghouder is van een verkeerd type!',
                'type' => 'Kies een geldig abonnements type!',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $validated = request()->validate(
            [
                'pasfoto' => 'image|required',
            ],
            [
                'pasfoto.required' => 'Een pasfoto is verplicht!',
                'pasfoto.image' => 'De gekozen pasfoto is van een verkeerd type! Gebruik: png, jpg, jpeg of gif.',
            ]
        );

        $signupModel = new Signup;
        $signupModel->NLvoornaam = $request->input('NLvoornaam');
        $signupModel->NLachternaam = $request->input('NLachternaam');
        $signupModel->NLemail = $request->input('NLemail');
        $signupModel->NLemailOudersVoogd = $request->input('NLemailOudersVoogd');
        $signupModel->NLpostcode = $request->input('NLpostcode');
        $signupModel->NLhuisnummer = $request->input('NLhuisnummer');
        $signupModel->NLgeboortedatum = $request->input('NLgeboortedatum');
        $signupModel->NLgeslacht = $request->input('NLgeslacht') == 0 ? "Man" : "Vrouw";
        $signupModel->NLtelefoonnummer = $request->input('NLtelefoonnummer');
        $signupModel->RHvoorletterachternaam = $request->input('RHvoorletterachternaam');
        $signupModel->RHiban = $request->input('RHiban');
        $signupModel->RHtelefoon = $request->input('RHtelefoon');
        $signupModel->RHemail = $request->input('RHemail');
        $signupModel->RHtype = $request->input('type') == 0 ? 'Competitie' : 'Recreant';
        $signupModel->pasfoto = $request->file('pasfoto')->store('images/sponsors', 'public');
        $functies = [
            $request->input("bestuur") ? "Ja" : "Nee",
            $request->input("activiteiten") ? "Ja" : "Nee",
            $request->input("trainer") ? "Ja" : "Nee",
            $request->input("coach") ? "Ja" : "Nee",
            $request->input("scheidsrechter") ? "Ja" : "Nee",
            $request->input("teammanager") ? "Ja" : "Nee",
            $request->input("jeugdlidonder14") ? "Ja" : "Nee",
        ];
        $oneIsTrue = false;
        foreach ($functies as $function) {
            if ($function == 'Ja') {
                $oneIsTrue = true;
            }
        }
        if ($oneIsTrue) {

            $signupModel->functies = $functies;
            $result = $this->sendEmail($signupModel);
            if ($result) {
                return redirect()->back()->with('success', 'Uw inschrijving is verzonden!');
            }
            return redirect()->back()->with('error', 'Er is geen inschrijving gedaan omdat er een fout optrad bij het versturen van de e-mail!');
        } else {
            return redirect()->back()->with('error', 'U moet minimaal een functie kiezen!');
        }
    }

    public function sendEmail($signupModel)
    {
        try {
            Mail::to('webmaster@esbcmenhir.nl')
                ->send(new SignupMail($signupModel));
            return true;
        } catch (\Exception $e) {
            Log::error('Er is een fout opgetreden bij het versturen van de signup mail: ' . $e->getMessage());
            return false;
        }
    }
}
