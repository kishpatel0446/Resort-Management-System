@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4 text-primary">💰 Pay Salary to Staff</h1>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">👥 Staff List</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th class="text-center">Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staffMember)
                    <tr>
                        <td class="align-middle">{{ $staffMember->name }}</td>
                        <td class="align-middle">{{ $staffMember->role }}</td>
                        <td class="text-center">
                            <a href="{{ route('salary.create', ['staffId' => $staffMember->id]) }}" class="btn btn-success btn-sm">
                                💵 Pay Salary
                            </a>
                            <a href="{{ route('withdrawal.create', ['staffId' => $staffMember->id]) }}" class="btn btn-warning btn-sm">
                                💳 Add Withdrawal
                            </a>
                            <a href="{{ route('salary.view', ['staffId' => $staffMember->id]) }}" class="btn btn-primary btn-sm ml-2">
                                <i class="fas fa-eye"></i> View Salary
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">🔙 Back to Dashboard</a>
    </div>
</div>
@endsection