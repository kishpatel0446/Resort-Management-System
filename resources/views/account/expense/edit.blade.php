@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Expense</h2>
    <form action="{{ route('daily-expenses.update', $dailyExpense->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $dailyExpense->date }}" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ $dailyExpense->category }}" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" value="{{ $dailyExpense->amount }}" required>
        </div>
        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control">{{ $dailyExpense->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Expense</button>
    </form>
</div>
@endsection
