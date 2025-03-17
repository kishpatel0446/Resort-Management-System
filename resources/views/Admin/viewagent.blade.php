@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-user-tie"></i> Bookings - Agent
            </h4>
        </div>
        <div class="card-body">
            @if($agentBookings->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> No agent bookings available.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Agent Name</th>
                            <th><i class="fas fa-phone-alt"></i> Contact</th>
                            <th><i class="fas fa-phone-alt"></i> Alt Contact</th>
                            <th>Time</th>
                            <th>Kids</th>
                            <th>Adults</th>
                            <th>Rate</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agentBookings as $agentBooking)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $agentBooking->id }}</span></td>
                            <td><span class="badge bg-success">
                                    {{ \Carbon\Carbon::parse($agentBooking->date)->format('d-m-Y') }}
                                </span></td>
                            <td>{{ $agentBooking->agentname }}</td>
                            <td>{{ $agentBooking->cn }}</td>
                            <td>{{ $agentBooking->acn }}</td>
                            <td>{{ $agentBooking->time }}</td>
                            <td><span class="badge bg-primary">{{ $agentBooking->kids }}</span></td>
                            <td><span class="badge bg-warning">{{ $agentBooking->adults }}</span></td>
                            <td><span class="text-primary">₹{{ $agentBooking->adults_rate }}</span></td>
                            <td><span class="text-danger">₹{{ $agentBooking->discount }}</span></td>
                            <td><span class="fw-bold text-success">₹{{ $agentBooking->netamount }}</span></td>
                            <td><a href="{{{ route('generate-bill-from-agent', $agentBooking->id) }}}" class="btn btn-sm btn-success"><i class="fas fa-file-invoice"></i> Generate Bill</a></td>
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