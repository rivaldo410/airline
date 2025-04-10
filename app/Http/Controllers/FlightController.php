<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\View\View;

class FlightController extends Controller
{
    public function index(): View
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function show(Flight $flight): View
    {
        $tickets = $flight->tickets;
        return view('flights.show', compact('flight', 'tickets'));
    }

    public function book(Flight $flight): View
    {
        return view('tickets.create', compact('flight'));
    }
}