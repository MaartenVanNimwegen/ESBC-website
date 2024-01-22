<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ViewLogin()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $validator = Validator::make(
            $request->input(),
            [
                'email' => ['required', 'max:250', 'email'],
                'password' => ['required', 'string'],
            ],
            [
                'email.max' => 'Het e-mail adres is te lang.',
                'password' => 'Het wachtwoord is niet valide.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'De combinatie van het e-mailadres en het wachtwoord is niet bij ons bekend.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
