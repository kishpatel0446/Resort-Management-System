@extends('layouts.admin')

@section('title', 'School Picnic Report')

@section('content')
<div class="container">
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

    <h2 class="mb-4">School Picnic Report</h2>

    <div class="row mb-4">
        <div class="col-md-3">
            <label>School Name</label>
            <input type="text" id="school_name" class="form-control" placeholder="Enter School Name">
        </div>
        <div class="col-md-3">
            <label>Date</label>
            <input type="date" id="date" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Address</label>
            <input type="text" id="address" class="form-control" placeholder="Enter Address">
        </div>
        <div class="col-md-3">
            <label>Time Slot</label>
            <select id="time_slot" class="form-control">
                <option value="">Select Time Slot</option>
                <option value="9:30 to 05 (RS.675)">9:30 to 05 (RS.675)</option>
                <option value="9:30 to 05 (RS.700)">9:30 to 05 (RS.700)</option>
                <option value="9:30 to 09 (RS.900)">9:30 to 09 (RS.900)</option>
            </select>
        </div>
        <div class="col-md-12 mt-3">
            <button class="btn btn-secondary" id="reset_filter">Reset Filters</button>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th class="text-nowrap">ID</th>
                    <th class="text-nowrap">Date</th>
                    <th class="text-nowrap">School Name</th>
                    <th class="text-nowrap">Address</th>
                    <th class="text-nowrap">Contact No</th>
                    <th class="text-nowrap">Time Slot</th>
                    <th class="text-nowrap">Students Count</th>
                    <th class="text-nowrap">Teacher Count</th>
                    <th class="text-nowrap">Total Fees</th>
                    <th class="text-nowrap">Booked By</th>
                </tr>
            </thead>
            <tbody id="school_table_body">
                @foreach($school as $school)
                <tr>
                    <td class="text-nowrap"><span class="badge bg-secondary">{{ $school->id }}</span></td>
                    <td class="text-nowrap"><span class="badge bg-success">
                            {{ \Carbon\Carbon::parse($school->date)->format('d-m-Y') }}
                        </span></td>
                    <td class="text-nowrap">{{ $school->sname }}</td>
                    <td class="text-nowrap"><i class="fas fa-map-marker-alt text-danger"></i> {{ $school->addr }}</td>
                    <td class="text-nowrap">{{ $school->cn }}</td>
                    <td class="text-nowrap">{{ $school->time }}</td>
                    <td class="text-nowrap"><span class="badge bg-primary">{{ $school->stud }}</span></td>
                    <td class="text-nowrap"><span class="badge bg-warning">{{ $school->teacher }}</span></td>
                    <td class="text-nowrap">{{ $school->netamount }}</td>
                    <td class="text-nowrap">{{ $school->admin ? $school->admin->name : 'Website' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#school_name, #date, #address, #time_slot').on('input change', function() {
            let school_name = $('#school_name').val();
            let date = $('#date').val();
            let address = $('#address').val();
            let time_slot = $('#time_slot').val();

            $.ajax({
                url: "{{ route('reports.school.picnic.filter') }}",
                method: "GET",
                data: {
                    school_name: school_name,
                    date: date,
                    address: address,
                    time_slot: time_slot
                },
                success: function(response) {
                    $('#school_table_body').html(response.data);
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Error: ", error);
                }
            });
        });

        $('#reset_filter').click(function() {
            $('#school_name').val('');
            $('#date').val('');
            $('#address').val('');
            $('#time_slot').val('');
            $('#school_name, #date, #address, #time_slot').trigger('change');
        });
    });
</script>
@endsection