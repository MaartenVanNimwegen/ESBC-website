<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/nieuws', [NewsController::class, 'index'])->name('index');
Route::get('/teams', function () {
    return view('teams');
});
Route::get('/wedstrijden', function () {
    return view('wedstrijden');
});
Route::get('/lid-worden', function () {
    return view('lid-worden');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
Route::get('/inschrijfformulier', function () {
    return view('inschrijfformulier');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');