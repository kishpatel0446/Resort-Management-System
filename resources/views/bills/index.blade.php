@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All Bills</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Net Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->id }}</td>
                <td>{{ \Carbon\Carbon::parse($bill->booking_date)->format('d-m-Y') }}</td>
                <td>{{ $bill->customer_name }}</td>
                <td>{{ $bill->total_amount }}</td>
                <td>{{ $bill->net_amount }}</td>
                <td>
                    <a href="{{ route('bills.show', $bill) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
