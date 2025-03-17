@extends('layouts.admin')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('updated'))
    <div class="alert alert-warning">
        {{ session('updated') }}
    </div>
@endif

<h1 class="text-center">Mark Attendance</h1>

<form action="{{ route('attendance.store') }}" method="POST">
    @csrf
    <div class="container">
        <h3 class="text-center">Staff Attendance for {{ \Carbon\Carbon::now()->format('d-m-Y') }}</h3>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Staff Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                    <th>Leave</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staff as $staffMember)
                    @php
                        $attendanceRecord = $staffMember->attendances->where('date', now()->format('Y-m-d'))->first();
                        $status = $attendanceRecord ? $attendanceRecord->status : null;
                        $displayStyle = $status == 'Leave' ? 'block' : 'none'; // Store the display style for leave time
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $staffMember->name }}</td>
                        <td>
                            <input type="hidden" name="attendance[{{ $staffMember->id }}][staff_id]" value="{{ $staffMember->id }}">
                            <input type="radio" name="attendance[{{ $staffMember->id }}][status]" value="Present" {{ $status == 'Present' ? 'checked' : '' }} required>
                        </td>
                        <td>
                            <input type="radio" name="attendance[{{ $staffMember->id }}][status]" value="Absent" {{ $status == 'Absent' ? 'checked' : '' }} required>
                        </td>
                        <td>
                            <input type="radio" name="attendance[{{ $staffMember->id }}][status]" value="Leave" {{ $status == 'Leave' ? 'checked' : '' }} required>
                        </td>
                    </tr>

                   <div id="leavetime">
                    <tr id="leave-time-{{ $staffMember->id }}" >
    <td colspan="5">
        <label for="leave-time-input-{{ $staffMember->id }}">Leave Time:</label>
        <input type="time" id="leave-time-input-{{ $staffMember->id }}" name="attendance[{{ $staffMember->id }}][leave_time]" value="{{ $attendanceRecord ? $attendanceRecord->leave_time : '' }}">
    </td>
</tr></div>

                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Submit Attendance</button>
        </div>
    </div>
</form>

@endsection
@section('script')
<script>
    function leave(x){
        if (x==1) document.getElementById("leavetime").style.display="block";
        else document.getElementById("leavetime").style.display="none";
    }
</script>
@endsection

@section('styles')
    <style>
        .container {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            color: #4CAF50;
            font-size: 2em;
        }

        h3 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        table {
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-lg {
            font-size: 18px;
            padding: 12px 30px;
        }

        .alert {
            margin-bottom: 20px;
        }

        .radio-group input {
            margin-right: 10px;
        }
    </style>
@endsection
