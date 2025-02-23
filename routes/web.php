<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\FMatchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('teams', TeamController::class)
    ->only(['index', 'store', 'update', 'destroy', 'show',]);
    
Route::resource('players', PlayerController::class)
->only(['index', 'store', 'update', 'destroy', 'show',]);

Route::resource('tournaments', TournamentController::class)
->only(['index', 'store', 'update', 'destroy', 'show',])
->middleware(['auth', 'verified']);;

Route::resource('matches', FMatchController::class)
->only(['index', 'store', 'update', 'destroy', 'show',])
->middleware(['auth', 'verified']);;

require __DIR__.'/auth.php';
