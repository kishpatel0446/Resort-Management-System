@extends('layouts.admin')

@section('title', 'Expense Report')

@section('content')
<div class="container">
    <h2>Expense Report</h2>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.account') ? 'active' : '' }}" href="{{ route('reports.account') }}">Account Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.income') ? 'active' : '' }}" href="{{ route('reports.income') }}">Income Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.expense') ? 'active' : '' }}" href="{{ route('reports.expense') }}">Expense Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.investment') ? 'active' : '' }}" href="{{ route('reports.investment') }}">Investment Report</a>
        </li>
    </ul>

    <div class="row mb-3">
        <div class="col-md-3">
            <label>Start Date</label>
            <input type="date" id="start_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label>End Date</label>
            <input type="date" id="end_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Category</label>
            <select id="category" class="form-control">
                <option value="">All</option>
                @foreach ($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <label>Min Amount</label>
            <input type="number" id="min_amount" class="form-control">
        </div>
        <div class="col-md-2">
            <label>Max Amount</label>
            <input type="number" id="max_amount" class="form-control">
        </div>
        <div class="col-md-2 mt-4">
            <button class="btn btn-danger" id="reset_filters">Reset</button>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Note</th>
                <th>Amount (₹)</th>
            </tr>
        </thead>
        <tbody id="expense_data">
            @include('reports.partials.expense_data', ['dailyExpenses' => $dailyExpenses, 'kitchenPurchases' => $kitchenPurchases, 'otherPurchases' => $otherPurchases])
        </tbody>
        <tfoot>
            <tr class="table-danger">
                <th colspan="3">Total Expenses</th>
                <th id="total_expenses">₹{{ number_format($totalExpenses, 2) }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchFilteredData() {
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            let category = $('#category').val();
            let min_amount = $('#min_amount').val();
            let max_amount = $('#max_amount').val();

            $.ajax({
                url: "{{ route('reports.expense.filter') }}",
                method: "GET",
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    category: category,
                    min_amount: min_amount,
                    max_amount: max_amount
                },
                success: function(response) {
                    $('#expense_data').html(response.data);
                    $('#total_expenses').html("₹" + response.total);
                },
                error: function(xhr, status, error) {
                    console.log("AJAX Error: ", error);
                }
            });
        }

        $('#start_date, #end_date, #category, #min_amount, #max_amount').on('change keyup', function() {
            fetchFilteredData();
        });

        $('#reset_filters').click(function() {
            $('#start_date, #end_date, #category, #min_amount, #max_amount').val('');
            fetchFilteredData();
        });
    });
</script>
@endsection