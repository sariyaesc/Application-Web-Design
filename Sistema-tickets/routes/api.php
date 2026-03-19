<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

// Agregamos .names() para evitar conflictos con las rutas de web.php
Route::apiResource('tickets', TicketController::class)->names('api.tickets');

// Ruta adicional para actualizar solo el status
Route::patch('tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('api.tickets.status');