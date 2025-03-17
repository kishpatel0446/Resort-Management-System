@extends('layouts.admin')

@section('title', 'Daily Report')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Bookings: {{ date('d-m-Y') }}</h2>

    @php
        $tables = [
            ['title' => 'Online Bookings', 'data' => $onlineBookings, 'table' => 'bookings', 'bg' => 'bg-primary', 'icon' => 'fas fa-laptop-house'],
            ['title' => 'Offline Bookings', 'data' => $offlineBookings, 'table' => 'admin_bookings', 'bg' => 'bg-secondary', 'icon' => 'fas fa-phone-alt'],
            ['title' => 'Agent Bookings', 'data' => $agentBookings, 'table' => 'agent_booking', 'bg' => 'bg-warning', 'icon' => 'fas fa-user-tie'],
            ['title' => 'School Picnic Bookings', 'data' => $schoolBookings, 'table' => 'school_booking', 'bg' => 'bg-info', 'icon' => 'fas fa-school']
        ];
    @endphp

    @foreach($tables as $table)
        <h4 class="text-white p-3 rounded {{ $table['bg'] }} mb-3">
            <i class="{{ $table['icon'] }} mr-2"></i>&nbsp;{{ $table['title'] }}
        </h4>
        @if($table['data']->isEmpty())
            <p class="text-center text-muted">No bookings available for {{ $table['title'] }}</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Contact Number</th>
                            <th>Time</th>
                            <th>Kids</th>
                            <th>Adults</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th>Advance</th>
                            <th>Pending Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($table['data'] as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->name ?? $booking->agentname ?? $booking->sname }}</td>
                                <td>{{ $booking->cn }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->kids ?? $booking->stud }}</td>
                                <td>{{ $booking->adults ?? $booking->teacher }}</td>
                                <td>{{ $booking->amount }}</td>
                                <td>{{ $booking->discount }}</td>
                                <td>{{ $booking->netamount }}</td>
                                <td>{{ $booking->advance }}</td>
                                <td>{{ $booking->netamount - $booking->advance }}</td> <!-- Pending amount calculation -->
                                <td id="status-{{ $booking->id }}">{{ $booking->status }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm check-in-btn" data-id="{{ $booking->id }}" data-table="{{ $table['table'] }}"
                                        {{ $booking->status == 'Checked In' ? 'disabled' : '' }}>Check In</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endforeach
</div>

<style>
    td, th {
        white-space: nowrap;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    .table th {
        background-color: #343a40;
        color: white;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }
    .table-hover tbody tr:hover {
        background-color: #e9ecef;
    }
    .check-in-btn {
        padding: 5px 10px;
    }
    .check-in-btn:disabled {
        cursor: not-allowed;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.check-in-btn').forEach(button => {
        button.addEventListener('click', function() {
            let bookingId = this.getAttribute('data-id');
            let tableName = this.getAttribute('data-table');
            let buttonElement = this;
            
            fetch(`/check-in/${tableName}/${bookingId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('status-' + bookingId).innerText = 'Checked In';
                    buttonElement.disabled = true;
                    buttonElement.classList.remove('btn-success');
                    buttonElement.classList.add('btn-secondary');
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>

@endsection
