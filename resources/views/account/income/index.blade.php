@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daily Income Records</h2>
    <a href="{{ route('daily-income.create') }}" class="btn btn-primary mb-3">Add Income</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Source</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomes as $income)
            <tr>
                <td>{{ \Carbon\Carbon::parse($income->date)->format('d M, Y') }}</td>
                <td>{{ $income->source }}</td>
                <td>₹{{ number_format($income->amount, 2) }}</td>
                <td>{{ $income->note }}</td>
                <td>
                    <a href="{{ route('daily-income.edit', $income->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('daily-income.destroy', $income->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this income record?');">Delete</button>
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