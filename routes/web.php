<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InschrijfController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TrainingenController;

Route::get('/', [HomeController::class, 'ViewHome'])->name('ViewHome');
Route::get('/nieuws', [NewsController::class, 'ViewNews'])->name('ViewNews');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/wedstrijden', [GameController::class, 'ViewGame']);
Route::get('/trainingen', [TrainingenController::class, 'ViewTrainingen']);
Route::get('/teams', [TeamController::class, 'ViewTeam']);
Route::post('/team-info', [TeamController::class, 'ViewTeamInfo'])->name('team-info');
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
Route::post('/signup', [InschrijfController::class, 'Signup'])->name('signup');
Route::get('/login', [AuthController::class, 'ViewLogin'])->name('ViewLogin');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'ViewDashboard'])->name('ViewDashboard');

    Route::post('/delete-news/{id}', [NewsController::class, 'delete'])->name('delete-news');
    Route::post('/delete-sponsor/{id}', [SponsorController::class, 'delete'])->name('delete-sponsor');
    Route::post('/delete-team/{id}', [TeamController::class, 'delete'])->name('delete-team');
    Route::post('/delete-training/{id}', [TrainingenController::class, 'delete'])->name('delete-training');

    Route::post('/update-news/{id}', [NewsController::class, 'update'])->name('update-news');
    Route::post('/update-sponsor/{id}', [SponsorController::class, 'update'])->name('update-sponsor');
    Route::post('/update-team/{id}', [TeamController::class, 'update'])->name('update-team');
    Route::post('/update-training/{id}', [TrainingenController::class, 'update'])->name('update-training');

    Route::post('/add-news', [NewsController::class, 'add'])->name('add-news');
    Route::post('/add-sponsor', [SponsorController::class, 'add'])->name('add-sponsor');
    Route::post('/add-team', [TeamController::class, 'add'])->name('add-team');
    Route::post('/add-training', [TrainingenController::class, 'add'])->name('add-training');
});