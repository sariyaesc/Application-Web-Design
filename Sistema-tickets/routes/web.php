<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketWebController;

// Redirige la raíz al listado de tickets (Vista Web)
Route::get('/', function () {
    return redirect()->route('tickets.index'); 
});

// Registra las 7 rutas para el CRUD con vistas (index, create, store, etc.)
Route::resource('tickets', TicketWebController::class);