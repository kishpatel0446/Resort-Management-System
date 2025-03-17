@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-calendar-check"></i> Bookings - Admin
            </h4>
        </div>
        <div class="card-body">
            @if($adminBookings->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> No admin bookings available.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Guest Name</th>
                            <th><i class="fas fa-phone-alt"></i> Contact</th>
                            <th>Time</th>
                            <th>Kids</th>
                            <th>Adults</th>
                            <th>Rate</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th>Booked By</th>
                            <th>Invoice</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminBookings as $adminBooking)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $adminBooking->id }}</span></td>
                            <td><span class="badge bg-success">
                                    {{ \Carbon\Carbon::parse($adminBooking->date)->format('d-m-Y') }}
                                </span></td>
                            <td>{{ $adminBooking->name }}</td>
                            <td>{{ $adminBooking->cn }}</td>
                            <td>{{ $adminBooking->time }}</td>
                            <td><span class="badge bg-primary">{{ $adminBooking->kids }}</span></td>
                            <td><span class="badge bg-warning">{{ $adminBooking->adults }}</span></td>
                            <td><span class="text-success">₹{{ $adminBooking->adults_rate }}</span></td>
                            <td><span class="text-danger">₹{{ $adminBooking->discount }}</span></td>
                            <td><span class="fw-bold text-primary">₹{{ $adminBooking->netamount }}</span></td>
                            <td><i class="fas fa-user"></i> {{ $adminBooking->admin ? $adminBooking->admin->name : 'N/A' }}</td>
                            <td><a href="{{{ route('generate-bill-from-admin', $adminBooking->id) }}}" class="btn btn-sm btn-success"><i class="fas fa-file-invoice"></i> Generate Bill</a></td>
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