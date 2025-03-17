@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Available Rooms</h1>

    <form method="GET" action="{{ route('rooms.index') }}" class="form-inline" id="checkdate">
        <div class="form-group">
            <label for="check_in_date">Check-in Date:</label>
            <input type="date" name="check_in_date" id="check_in_date" class="form-control"
                value="{{ request('check_in_date', now()->toDateString()) }}" required>
        </div>
        <div class="form-group ml-3">
            <label for="check_out_date">Check-out Date:</label>
            <input type="date" name="check_out_date" id="check_out_date" class="form-control"
                value="{{ request('check_out_date', now()->addDay()->toDateString()) }}" required>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Search</button>
    </form>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>Price per Night</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
            @php
            $checkInDate = request('check_in_date', now()->toDateString());
            $checkOutDate = request('check_out_date', now()->addDay()->toDateString());

            $isBookedOffline = DB::table('room_bookings')
            ->where('room_id', $room->id)
            ->where('status', 'Booked')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
            $query->where('check_in', '<', $checkOutDate)
                ->where('check_out', '>', $checkInDate);
                })
                ->exists();

                $isBookedOnline = DB::table('online_bookings')
                ->join('booking_room', 'online_bookings.id', '=', 'booking_room.online_booking_id')
                ->where('booking_room.room_id', $room->id)
                ->where('online_bookings.status', 'confirmed')
                ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where('check_in', '<', $checkOutDate)
                    ->where('check_out', '>', $checkInDate);
                    })
                    ->exists();

                    $isBooked = $isBookedOffline || $isBookedOnline;
                    @endphp

                    <tr>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>₹{{ $room->price_per_night }}</td>
                        <td>
                            @if($room->maintenance)
                            <span class="badge bg-warning">Under Maintenance</span>
                            @elseif($isBooked)
                            <span class="badge bg-danger">Booked</span>
                            @else
                            <span class="badge bg-success">Available</span>
                            @endif
                        </td>
                        <td>
                            @if(!$room->maintenance && !$isBooked)
                            <a href="{{ route('rooms.offline-booking-form', ['room_id' => $room->id, 'check_in_date' => $checkInDate, 'check_out_date' => $checkOutDate]) }}" class="btn btn-primary">Allot Room</a>
                            @else
                            <button class="btn btn-secondary" disabled>Not Available</button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No available rooms found for the selected dates.</td>
                    </tr>
                    @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkInInput = document.getElementById('check_in_date');
        const checkOutInput = document.getElementById('check_out_date');

        function validateDates() {
            const checkInDate = new Date(checkInInput.value);
            const checkOutDate = new Date(checkOutInput.value);

            if (checkOutDate <= checkInDate) {
                alert('Check-out date must be after check-in date.');
                const nextDay = new Date(checkInDate);
                nextDay.setDate(nextDay.getDate() + 1);
                checkOutInput.value = nextDay.toISOString().split('T')[0];
            }
        }

        checkInInput.addEventListener('change', function() {
            const today = new Date().toISOString().split('T')[0];
            if (checkInInput.value < today) {
                alert('Check-in date cannot be in the past.');
                checkInInput.value = today;
            }
            validateDates();
        });

        checkOutInput.addEventListener('change', validateDates);
    });
</script>
<style>
    th {
        background-color: black !important;
        color: white !important;
        font-size: 16px;
        text-align: center;
        white-space: nowrap;

    }

    td {
        border: 1px solid black !important;
    }

    th:first-child {
        border-left: 1px solid black !important;
    }

    th:last-child {
        border-right: 1px solid black !important;
    }
</style>
@endsection