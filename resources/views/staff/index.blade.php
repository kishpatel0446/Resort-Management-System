@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Staff List</h2>
    
    <!-- Button to Add New Staff -->
    <div class="text-center mb-4">
        <a href="{{ route('staff.addstaff') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i> Add New Staff
        </a>
    </div>
    
    <!-- Staff Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Contact</th>
                    <th>Aadhar No</th>
                    <th>Salary</th>
                    <th>Joining Date</th>
                    <th>Remove</th> <!-- Column for Remove button -->
                </tr>
            </thead>
            <tbody>
                @foreach ($staff as $member)
                <tr>
                    <td>
                        @if ($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" width="50" height="50" class="rounded-circle">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role }}</td>
                    <td>{{ $member->contact_no }}</td>
                    <td>{{ $member->aadhar_no }}</td>
                    <td>{{ number_format($member->salary, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($member->joining_date)->format('d-m-Y') }}</td>
                    
                    <!-- Remove Button -->
                    <td>
                        <form action="{{ route('staff.remove', ['staffId' => $member->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this staff member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
