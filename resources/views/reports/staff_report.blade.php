@extends('layouts.admin')

@section('title', 'Staff Report')

@section('content')
<div class="container">
    <h2>Staff Report</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Role</th>
                <th>Salary</th>
                <th>Joining Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through report data -->
        </tbody>
    </table>
</div>
@endsection
