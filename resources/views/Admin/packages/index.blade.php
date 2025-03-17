@extends('layouts.admin')

@section('content')

<style>
    /* Container spacing to adjust sidebar gap */
    .content-container {
        margin-left: 20px; /* Adjust for proper spacing */
    }

    /* Table styling */
    .table-container {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        background: #007BFF;
        color: white;
        text-align: center;
        font-size: 16px;
        padding: 12px;
        text-transform: uppercase;
    }

    .table td {
        text-align: center;
        padding: 12px;
        font-size: 15px;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background: rgba(0, 123, 255, 0.1);
    }

    
    .btn-add {
        display: inline-block;
        background: linear-gradient(135deg, #28A745, #218838);
        color: white;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-add:hover {
        background: linear-gradient(135deg, #218838, #1C7430);
        color: white;
    }

    .btn-sm {
        padding: 6px 10px;
        font-size: 14px;
        transition: 0.3s ease-in-out;
    }

    .btn-primary {
        background: linear-gradient(135deg, #007BFF, #0056B3);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0056B3, #004085);
    }

    .btn-danger {
        background: linear-gradient(135deg, #D61D1D, #B71C1C);
        border: none;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #B71C1C, #911515);
    }
</style>

<div class="content-container">
    <h2 class="text-center mb-4">🎟 Manage Packages</h2>
    <div class="text-end">
        <a href="{{ route('admin.packages.create') }}" class="btn-add">+ Add Package</a>
    </div>

    <div class="table-container mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                <tr>
                    <td><strong>{{ $package->time }}</strong></td>
                    <td>{{ $package->details }}</td>
                    <td><span class="text-success">Rs. {{ number_format($package->price, 2) }}</span></td>
                    <td>{{ ucfirst($package->type) }}</td>
                    <td>
                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-primary btn-sm">✏ Edit</a>
                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this package?')">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
