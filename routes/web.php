<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');
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