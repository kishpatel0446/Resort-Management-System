@extends('layouts.admin')

@section('content')
<h2 class="custom-heading text-center mb-4">Room Booking Details</h2>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Offline Room Bookings</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Room</th>
                        <th>Room Price</th>
                        <th>Extra Bed</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Advance</th>
                        <th>Discount</th>
                        <th>Net Amount</th>
                        <th>Checked-out At</th>
                        <th>Booked By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offlineBookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->customer_phone }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-m-Y') }}</td>
                        <td>{{ $booking->room->room_number }}</td>
                        <td>₹ {{ number_format($booking->price, 2) }}</td>
                        <td>{{ $booking->extra_bed }}</td>
                        <td>₹ {{ number_format($booking->extra_bed_price, 2) }}</td>
                        <td>₹ {{ number_format($booking->total_price, 2) }}</td>
                        <td>₹ {{ number_format($booking->advance, 2) }}</td>
                        <td>₹ {{ number_format($booking->discount, 2) }}</td>
                        <td>₹ {{ number_format($booking->netamount, 2) }}</td>
                        <td>{{ $booking->checkout_date_time }}</td>
                        <td>Offline</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow-sm mt-5">
    <div class="card-header bg-success text-white">
        <h3 class="mb-0">Online Room Bookings</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Room</th>
                        <th>Room Price</th>
                        <th>Extra Bed</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Advance</th>
                        <th>Discount</th>
                        <th>Net Amount</th>
                        <th>Booked By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($onlineBookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->customer_name }}</td>
                        <td>{{ $booking->customer_phone }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-m-Y') }}</td>
                        <td>
                            @foreach($booking->rooms as $room)
                                {{ $room->room_number }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>₹ {{ number_format($booking->price, 2) }}</td>
                        <td>{{ $booking->extra_bed }}</td>
                        <td>₹ {{ number_format($booking->extra_bed_price, 2) }}</td>
                        <td>₹ {{ number_format($booking->total_price, 2) }}</td>
                        <td>₹ {{ number_format($booking->advance, 2) }}</td>
                        <td>₹ {{ number_format($booking->discount, 2) }}</td>
                        <td>₹ {{ number_format($booking->netamount, 2) }}</td>
                        <td>Online</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .custom-heading {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
    }
    
    .card-header {
        padding: 10px 15px;
        font-size: 18px;
        font-weight: 600;
    }

    .table {
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .table th, .table td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .badge {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 13px;
    }
</style>

@endsection
