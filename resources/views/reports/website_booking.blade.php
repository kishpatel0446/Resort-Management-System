@extends('layouts.admin')

@section('title', 'Admin Bookings')

@section('content')
<div class="container mt-4">
    <ul class="nav nav-tabs mb-4">
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

    <h2 class="mb-4 text-center text-primary">Website Bookings</h2>

    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <form id="filterForm" method="GET" action="{{ route('reports.admin_booking') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-2">
                        <label for="date" class="form-label">Booking Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="name" class="form-label">Customer Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ request('name') }}" placeholder="Search by name">
                    </div>
                    <div class="col-md-2">
                        <label for="adults" class="form-label">Adults</label>
                        <input type="number" name="adults" id="adults" class="form-control" value="{{ request('adults') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="kids" class="form-label">Kids</label>
                        <input type="number" name="kids" id="kids" class="form-control" value="{{ request('kids') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control" value="{{ request('contact') }}" placeholder="Search by contact">
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" id="resetBtn" class="btn btn-outline-secondary px-4 py-2 rounded-pill shadow-sm">Reset Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mb-0" id="bookingTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Booking Date</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Adults</th>
                            <th>Kids</th>
                            <th>Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($websiteBookings as $booking)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->cn }}</td>
                            <td>{{ $booking->adults }}</td>
                            <td>{{ $booking->kids }}</td>
                            <td>{{ $booking->netamount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endsection

            @section('scripts')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function applyFilter() {
                    var date = $('#date').val();
                    var name = $('#name').val();
                    var adults = $('#adults').val();
                    var kids = $('#kids').val();
                    var contact = $('#contact').val();

                    $.ajax({
                        url: "{{ route('reports.website_booking') }}",
                        method: 'GET',
                        data: {
                            date: date,
                            name: name,
                            adults: adults,
                            kids: kids,
                            contact: contact
                        },
                        success: function(response) {
                            $('#bookingTable tbody').html(response);
                        }
                    });
                }

                $('#date, #name, #adults, #kids, #contact').on('change', function() {
                    applyFilter();
                });

                $('#resetBtn').on('click', function() {
                    $('#date').val('');
                    $('#name').val('');
                    $('#adults').val('');
                    $('#kids').val('');
                    $('#contact').val('');
                    applyFilter();
                });
            </script>
            @endsection