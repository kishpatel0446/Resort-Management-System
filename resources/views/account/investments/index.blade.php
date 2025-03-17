@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Investment Records</h2>
    <a href="{{ route('investments.create') }}" class="btn btn-primary mb-3">Add Investment</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Investor Name</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($investments as $investment)
            <tr>
                <td>{{ \Carbon\Carbon::parse($investment->date)->format('d M, Y') }}</td>
                <td>{{ $investment->investor_name }}</td>
                <td>₹{{ number_format($investment->amount, 2) }}</td>
                <td>{{ $investment->note }}</td>
                <td>
                    <a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('investments.destroy', $investment->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    th {
        background-color: black !important;
        color: white !important;
        font-size: 16px;
        text-align: center;
        white-space: nowrap;
    }

    td {
        font-size: 15px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid black !important;
    }
</style>


@endsection