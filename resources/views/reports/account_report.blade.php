@extends('layouts.admin')

@section('title', 'Account Report')

@section('content')
<div class="container">
    <h2>Account Report</h2>


    <form method="GET" action="{{ route('reports.account') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
            </div>
            <div class="col-md-4">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
            </div>
            <div class="col-md-4">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary d-block w-100">Filter</button>
            </div>
        </div>
    </form>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reports.account') }}">Account Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.income') }}">Income Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.expense') }}">Expense Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.investment') }}">Investment Report</a>
        </li>
    </ul>


    <h4>Account Summary ({{ $startDate }} to {{ $endDate }})</h4>
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>Total Income</th>
                <th>Total Expenses</th>
                <th>Total Investments</th>
                <th>Net Profit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>₹{{ number_format($totalIncome, 2) }}</td>
                <td>₹{{ number_format($totalExpenses, 2) }}</td>
                <td>₹{{ number_format($totalInvestments, 2) }}</td>
                <td>₹{{ number_format($netProfit, 2) }}</td>
            </tr>
        </tbody>
    </table>

    @if ($totalIncome == 0 && $totalExpenses == 0 && $totalInvestments == 0)
    <div class="alert alert-warning text-center">
        No data available for the selected date range.
    </div>
    @endif
</div>
@endsection