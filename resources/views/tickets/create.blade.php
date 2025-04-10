@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h2 class="text-xl font-bold mb-4">Ticket Booking for {{ $flight->flight_code }}</h2>
        
        <div class="mb-6 p-4 bg-gray-100 rounded">
            <p class="text-gray-700 mb-1">{{ $flight->origin }}->{{ $flight->destination }}</p>
            <p class="text-gray-700 mb-1"><strong>Departure:</strong> {{ $flight->departure_time->format('l, d F Y, H:i') }}</p>
            <p class="text-gray-700"><strong>Arrival:</strong> {{ $flight->arrival_time->format('l, d F Y, H:i') }}</p>
        </div>

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">

            <div class="mb-4">
                <label for="passenger_name" class="block text-gray-700 mb-2">Passenger Name</label>
                <input type="text" name="passenger_name" id="passenger_name" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="passenger_phone" class="block text-gray-700 mb-2">Passenger Phone</label>
                <input type="text" name="passenger_phone" id="passenger_phone" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="seat_number" class="block text-gray-700 mb-2">Seat Number</label>
                <input type="text" name="seat_number" id="seat_number" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('flights.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Book Ticket</button>
            </div>
        </form>
    </div>
@endsection