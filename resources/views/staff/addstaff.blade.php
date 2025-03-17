@extends('layouts.admin')

@section('content')
@if(session('success'))
    <div style="color: green; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h2 class="text-center">Add Staff</h2>
    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Aadhar Number</label>
            <input type="text" name="aadhar_no" class="form-control" required maxlength="12" minlength="12">
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contact_no" class="form-control" required maxlength="10" minlength="10">
        </div>

        <div class="mb-3">
            <label class="form-label">Salary Per Month</label>
            <input type="number" name="salary" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <input type="text" name="role" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Joining Date</label>
            <input type="date" name="joining_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Staff Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Staff</button>
    </form>
    <br>
</div>
@endsection
