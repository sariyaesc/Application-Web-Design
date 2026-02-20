<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/start', function () {
    return view('index');
});

Route::get('/superheroes', [SuperheroController::class, 'index']);
