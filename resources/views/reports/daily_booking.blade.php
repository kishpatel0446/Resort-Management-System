@extends('layouts.admin')

@section('title', 'Daily Booking Report')

@section('content')
<div class="container">
    <h2>All Bookings Report</h2>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.daily_booking') ? 'active' : '' }}"
                href="{{ route('reports.daily_booking') }}">
                All Bookings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.admin_booking') ? 'active' : '' }}"
                href="{{ route('reports.admin_booking') }}">
                Admin Bookings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.website_booking') ? 'active' : '' }}"
                href="{{ route('reports.website_booking') }}">
                Website Booking
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.agent_booking') ? 'active' : '' }}"
                href="{{ route('reports.agent_booking') }}">
                Agent Booking
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.school_picnic') ? 'active' : '' }}"
                href="{{ route('reports.school_picnic') }}">
                School Booking
            </a>
        </li>
    </ul>

    <form method="GET" action="{{ route('reports.daily_booking') }}" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <label for="date">Select Date:</label>
            <input type="date" name="date" class="form-control" value="{{ request('date') }}">
        </div>
        <div class="col-md-4">
            <label for="time">Select Time (e.g., 09 to 09):</label>
            <input type="text" name="time" class="form-control" value="{{ request('time') }}" placeholder="09 to 09">
        </div>
        <div class="col-md-4 mt-4">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('reports.daily_booking') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

    <!-- Booking Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Time</th>
                    <th>Adults</th>
                    <th>Kids</th>
                    <th>Amount</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adminBooking as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->cn }}</td>
                    <td>{{ $booking->time }}</td>
                    <td>{{ $booking->adults }}</td>
                    <td>{{ $booking->kids }}</td>
                    <td>Rs. {{ number_format($booking->netamount, 2) }}</td>
                    <td>Admin</td>
                </tr>
                @endforeach

                @foreach($schoolBooking as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                    <td>{{ $booking->sname }}</td>
                    <td>{{ $booking->cn }}</td>
                    <td>{{ $booking->time }}</td>
                    <td>{{ $booking->teacher }}</td>
                    <td>{{ $booking->stud }}</td>
                    <td>Rs. {{ number_format($booking->netamount, 2) }}</td>
                    <td>School</td>
                </tr>
                @endforeach

                @foreach($agentBooking as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                    <td>{{ $booking->agentname }}</td>
                    <td>{{ $booking->cn }}</td>
                    <td>{{ $booking->time }}</td>
                    <td>{{ $booking->adults }}</td>
                    <td>{{ $booking->kids }}</td>
                    <td>Rs. {{ number_format($booking->netamount, 2) }}</td>
                    <td>Agent</td>
                </tr>
                @endforeach

                @foreach($onlineBooking as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->cn }}</td>
                    <td>{{ $booking->time }}</td>
                    <td>{{ $booking->adults }}</td>
                    <td>{{ $booking->kids }}</td>
                    <td>Rs. {{ number_format($booking->netamount, 2) }}</td>
                    <td>Online</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
