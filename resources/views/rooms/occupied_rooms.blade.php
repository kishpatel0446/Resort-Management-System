@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="custom-heading">Occupied Rooms</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('rooms.occupied') }}" method="GET" class="form-inline">
        <div class="form-group">
            <label for="check_in_date">Check-in Date:</label>
            <input type="date" name="check_in_date" id="check_in_date" class="form-control"
    value="{{ request('check_in_date', now()->toDateString()) }}">
        </div>
        <div class="form-group ml-3">
            <label for="check_out_date">Check-out Date:</label>
            <input type="date" name="check_out_date" id="check_out_date" class="form-control"
            value="{{ request('check_out_date', now()->addDay()->toDateString()) }}">
        </div>
        <button type="submit" class="btn btn-primary ml-3">Search</button>
    </form>

    @if($occupiedRooms->isEmpty())
    <div class="alert alert-warning mt-3">No occupied rooms found for the selected dates.</div>
    @else
    <table class="table mt-3 table-bordered">
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Booking Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($occupiedRooms as $booking)
            <tr>
                <td>{{ $booking['room_number'] }}</td>
                <td>{{ $booking['customer_name'] }}</td>
                <td>{{ $booking['customer_phone'] }}</td>
                <td>{{ \Carbon\Carbon::parse($booking['check_in'])->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($booking['check_out'])->format('d-m-Y') }}</td>
                <td>
                    @if($booking['is_online'])
                    <span class="badge bg-info">Online Booking</span>
                    @else
                    <span class="badge bg-secondary">Offline Booking</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('rooms.checkout', $booking['booking_id']) }}" method="POST">
                        @csrf
                        <input type="hidden" name="check_in_date" value="{{ request('check_in_date') }}">
                        <input type="hidden" name="check_out_date" value="{{ request('check_out_date') }}">
                        <button type="submit" class="btn btn-danger btn-sm">Check-out</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
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
                checkOutInput.value = new Date(checkInDate.setDate(checkInDate.getDate() + 1)).toISOString().split('T')[0];
            }
        }

        checkInInput.addEventListener('change', validateDates);
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
        font-size: 15px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid black !important;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .badge {
        font-size: 12px;
        padding: 5px 8px;
    }
</style>
@endsection