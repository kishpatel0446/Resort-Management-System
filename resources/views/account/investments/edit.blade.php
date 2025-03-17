@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Investment</h2>
    <form action="{{ route('investments.update', $investment->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $investment->date }}" required>
        </div>
        <div class="mb-3">
            <label>Investor Name</label>
            <input type="text" name="investor_name" class="form-control" value="{{ $investment->investor_name }}" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" value="{{ $investment->amount }}" required>
        </div>
        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control">{{ $investment->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Investment</button>
    </form>
</div>
@endsection