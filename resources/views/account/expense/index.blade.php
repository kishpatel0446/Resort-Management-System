@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Daily Expense Records</h2>
        <a href="{{ route('daily-expenses.create') }}" class="btn btn-primary">+ Add Expense</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
        <table class="table table-striped table-bordered text-center align-middle">
            <thead class="table-dark text-nowrap sticky-top">
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($expenses as $expense)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($expense->date)->format('d M, Y') }}</td>
                    <td>{{ $expense->category }}</td>
                    <td><strong>₹{{ number_format($expense->amount, 2) }}</strong></td>
                    <td>{{ $expense->note ?? '-' }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('daily-expenses.edit', $expense->id) }}" class="btn btn-sm btn-warning">✏ Edit</a>
                        <form action="{{ route('daily-expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this expense record?');">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach


                @foreach($kitchenPurchases as $purchase)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') }}</td>
                    <td>{{ $purchase->category }}</td>
                    <td><strong>₹{{ number_format($purchase->amount, 2) }}</strong></td>
                    <td><span class="badge bg-info">Kitchen</span></td>
                    <td><span class="badge bg-secondary">N/A</span></td>
                </tr>
                @endforeach


                @foreach($otherPurchases as $purchase)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') }}</td>
                    <td>{{ $purchase->category }}</td>
                    <td><strong>₹{{ number_format($purchase->amount, 2) }}</strong></td>
                    <td><span class="badge bg-warning text-dark">Other Purchase</span></td>
                    <td><span class="badge bg-secondary">N/A</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<style>
    td {
        font-size: 15px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid black !important;
    }
</style>
@endsection