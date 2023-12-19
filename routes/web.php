<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/delete-news/{id}', [NewsController::class, 'delete'])->name('delete');
    Route::post('/delete-sponsor/{id}', [SponsorController::class, 'delete'])->name('delete');
    Route::post('/update-news/{id}', [NewsController::class, 'update'])->name('update');
    Route::post('/update-sponsor/{id}', [SponsorController::class, 'update'])->name('update');
});