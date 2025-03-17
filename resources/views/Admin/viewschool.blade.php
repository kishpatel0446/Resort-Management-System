@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-school"></i> Bookings - School
            </h4>
        </div>
        <div class="card-body">
            @if($schoolBookings->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> No school bookings available.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>School Name</th>
                            <th>Address</th>
                            <th><i class="fas fa-phone-alt text-success"></i> Contact</th>
                            <th>Time</th>
                            <th>Students</th>
                            <th>Teachers</th>
                            <th>Booked By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schoolBookings as $schoolBooking)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $schoolBooking->id }}</span></td>
                            <td><span class="badge bg-success">
                                    {{ \Carbon\Carbon::parse($schoolBooking->date)->format('d-m-Y') }}
                                </span></td>
                            <td>{{ $schoolBooking->sname }}</td>
                            <td><i class="fas fa-map-marker-alt text-danger"></i> {{ $schoolBooking->addr }}</td>
                            <td>{{ $schoolBooking->cn }}</td>
                            <td>{{ $schoolBooking->time }}</td>
                            <td><span class="badge bg-primary">{{ $schoolBooking->stud }}</span></td>
                            <td><span class="badge bg-warning">{{ $schoolBooking->teacher }}</span></td>
                            <td>{{ $schoolBooking->admin ? $schoolBooking->admin->name : 'Website' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
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
</style>
@endsection