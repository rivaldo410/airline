@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-bold mb-2">Ticket Details for {{ $flight->flight_code }}</h2>
        <p class="text-gray-600 mb-1">{{ $flight->origin }}->{{ $flight->destination }}</p>
        <p class="text-gray-600 mb-1"><strong>Departure:</strong> {{ $flight->departure_time->format('l, d F Y, H:i') }}</p>
        <p class="text-gray-600"><strong>Arrival:</strong> {{ $flight->arrival_time->format('l, d F Y, H:i') }}</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4">Passengers list</h3>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">No.</th>
                        <th class="py-2 px-4 border-b">Passenger Name</th>
                        <th class="py-2 px-4 border-b">Passenger Phone</th>
                        <th class="py-2 px-4 border-b">Seat Number</th>
                        <th class="py-2 px-4 border-b">Boarding</th>
                        <th class="py-2 px-4 border-b">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $loop->iteration }}.</td>
                            <td class="py-2 px-4 border-b">{{ $ticket->passenger_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $ticket->passenger_phone }}</td>
                            <td class="py-2 px-4 border-b">{{ $ticket->seat_number }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($ticket->is_boarding)
                                    {{ $ticket->boarding_time ? $ticket->boarding_time->format('d-m-Y, H:i') : '' }}
                                @else
                                    <form action="{{ route('tickets.board', $ticket) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-blue-500 hover:text-blue-700">Confirm</button>
                                    </form>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">
                                @if(!$ticket->is_boarding)
                                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                @else
                                    <span class="text-gray-400">Delete</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('flights.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Back</a>
    </div>
@endsection