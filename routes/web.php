<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('flights.index');
});

Route::resource('flights', FlightController::class)->only(['index', 'show']);
Route::get('flights/book/{flight}', [FlightController::class, 'book'])->name('flights.book');

Route::post('ticket/submit', [TicketController::class, 'store'])->name('tickets.store');
Route::put('ticket/board/{ticket}', [TicketController::class, 'board'])->name('tickets.board');
Route::delete('ticket/delete/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');