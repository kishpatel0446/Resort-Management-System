@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add Expense</h2>
    <form action="{{ route('daily-expenses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Expense</button>
    </form>
</div>
@endsection