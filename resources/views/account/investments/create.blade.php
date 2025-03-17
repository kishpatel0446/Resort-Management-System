@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add Investment</h2>
    <form action="{{ route('investments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Investor Name</label>
            <input type="text" name="investor_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Note</label>
            <textarea name="note" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Investment</button>
    </form>
</div>
@endsection
