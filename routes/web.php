<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\FMatchController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('teams', TeamController::class)
    ->only(['index', 'store', 'update', 'destroy', 'show',]);

Route::resource('players', PlayerController::class)
->only(['index', 'store', 'update', 'destroy', 'show',]);

Route::resource('tournaments', TournamentController::class)
->only(['index', 'store', 'update', 'destroy', 'show',]);

Route::resource('matches', FMatchController::class)
->only(['index', 'store', 'update', 'destroy', 'show',]);


