@extends('layouts.admin')

@section('content')
<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('updated'))
    <div class="alert alert-warning">
        {{ session('updated') }}
    </div>
@endif
<div class="container mt-4">
    <h2 class="text-center mb-4">Attendance Records</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Staff Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Leave Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->staff->name }}</td>
                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                <td>
                    @if($attendance->status == 'Present')
                        <span class="badge bg-success">Present</span>
                    @elseif($attendance->status == 'Absent')
                        <span class="badge bg-danger">Absent</span>
                    @else
                        <span class="badge bg-warning">Leave</span>
                    @endif
                </td>
               
                <td>
                    @if($attendance->status == 'Leave' && $attendance->leave_time)
                        <span class="badge bg-info">{{ $attendance->leave_time }}</span>
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="{{ route('attendance.index') }}" class="btn btn-dark">🔙 Back to Attendance</a>
    </div>
</div>
@endsection
