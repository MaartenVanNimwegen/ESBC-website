<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/teams', function () {
    return view('teams');
});
Route::get('/nieuws', function () {
    return view('nieuws');
});
Route::get('/wedstrijden', function () {
    return view('wedstrijden');
});
Route::get('/lid-worden', function () {
    return view('lid-worden');
});
Route::get('/privacy-policy', function () {
    return view('privacyPolicy');
});