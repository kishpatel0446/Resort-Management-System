@extends('layouts.admin')

@section('content')
    <h2 class="custom-heading">Room Details</h2>

    <a href="{{ route('rooms.create') }}" class="btn btn-success mb-3">Add New Room</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Capacity</th>
                <th>Price per Night</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>₹ {{ number_format($room->price_per_night, 2) }}</td>
                    <td>
                        @if($room->maintenance) 
                            <span class="badge bg-warning">Under Maintenance</span>
                        @elseif(!$room->is_available) 
                            <span class="badge bg-danger">Booked</span>
                        @else 
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('rooms.delete', $room->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                        @if(!$room->maintenance)
                            <form action="{{ route('rooms.maintenance', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">Mark as Maintenance</button>
                            </form>
                        @else
                            <form action="{{ route('rooms.available', $room->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Mark as Available</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
