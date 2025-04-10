<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3',
        ]);

        Ticket::create($validated);

        return redirect()->route('flights.show', $request->flight_id)
            ->with('success', 'Ticket booked successfully!');
    }

    public function board(Ticket $ticket): RedirectResponse
    {
        if (!$ticket->is_boarding) {
            $ticket->update([
                'is_boarding' => true,
                'boarding_time' => now(),
            ]);
            return back()->with('success', 'Boarding confirmed!');
        }

        return back()->with('error', 'Ticket already boarded!');
    }

    public function destroy(Ticket $ticket): RedirectResponse
    {
        if ($ticket->is_boarding) {
            return back()->with('error', 'Cannot delete a boarded ticket!');
        }

        $ticket->delete();
        return back()->with('success', 'Ticket deleted successfully!');
    }
}