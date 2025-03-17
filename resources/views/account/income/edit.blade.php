@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Income</h2>
    <form action="{{ route('daily-income.update', $dailyIncome->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $dailyIncome->date }}" required>
        </div>
        <div class="mb-3">
            <label>Source</label>
            <input type="text" name="source" class="form-control" value="{{ $dailyIncome->source }}" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" value="{{ $dailyIncome->amount }}" required>
        </div>
        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control">{{ $dailyIncome->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Income</button>
    </form>

</div>
@endsection