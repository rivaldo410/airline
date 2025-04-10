@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($flights as $flight)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-2">{{ $flight->flight_code }} {{ $flight->origin }}->{{ $flight->destination }}</h2>
                <p class="text-gray-600 mb-1"><strong>Departure:</strong> {{ $flight->departure_time->format('l, d F Y, H:i') }}</p>
                <p class="text-gray-600 mb-4"><strong>Arrival:</strong> {{ $flight->arrival_time->format('l, d F Y, H:i') }}</p>
                
                <div class="flex space-x-2">
                    <a href="{{ route('flights.book', $flight) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Book Ticket</a>
                    <a href="{{ route('flights.show', $flight) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection