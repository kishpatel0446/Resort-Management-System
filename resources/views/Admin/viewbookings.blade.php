@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-globe"></i> Bookings - Website
            </h4>
        </div>
        <div class="card-body">
            @if($bookings->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> No bookings available.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Guest Name</th>
                            <th><i class="fas fa-phone-alt text-warning"></i> Contact</th>
                            <th><i class="fas fa-phone-alt text-warning"></i> Alt Contact</th>
                            <th>Time</th>
                            <th>Kids</th>
                            <th>Adults</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $booking->id }}</span></td>
                            <td><span class="badge bg-success">
                                    {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}
                                </span></td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->cn }}</td>
                            <td>{{ $booking->acn }}</td>
                            <td>{{ $booking->time }}</td>
                            <td><span class="badge bg-primary">{{ $booking->kids }}</span></td>
                            <td><span class="badge bg-warning">{{ $booking->adults }}</span></td>
                            <td>
                                <a href="{{ route('generate-bill-from-website', $booking->id) }}}" class="btn btn-sm btn-success">
                                    <i class="fas fa-file-invoice"></i> Generate Bill
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection