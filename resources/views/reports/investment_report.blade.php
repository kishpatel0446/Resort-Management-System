@extends('layouts.admin')

@section('title', 'Investment Report')

@section('content')
<div class="container">
    <h2>Investment Report</h2>
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
            <label for="investor_name">Investor Name:</label>
            <input type="text" id="investor_name" class="form-control" placeholder="Search by Investor Name">
        </div>
        <div class="col-md-3">
            <label for="amount">Amount (₹):</label>
            <input type="number" id="amount" class="form-control" placeholder="Enter Amount">
        </div>
        <div class="col-md-3">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" class="form-control">
        </div>
    </div>


    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Investor Name</th>
                <th>Note</th>
                <th>Amount (₹)</th>
            </tr>
        </thead>
        <tbody id="investmentTable">
            @include('reports.partials.investment_table')
        </tbody>
        <tfoot>
            <tr class="table-info">
                <th colspan="3">Total Investments</th>
                <th id="totalInvestmentAmount">₹{{ number_format($totalInvestments, 2) }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchData() {
            var investorName = $("#investor_name").val();
            var amount = $("#amount").val();
            var startDate = $("#start_date").val();
            var endDate = $("#end_date").val();

            $.ajax({
                url: "{{ route('reports.investment.filter') }}",
                type: "GET",
                data: {
                    investor_name: investorName,
                    amount: amount,
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    $("#investmentTable").html(response.html);
                    $("#totalInvestmentAmount").text("₹" + response.totalInvestments.toFixed(2));
                }
            });
        }

        $("#investor_name, #amount, #start_date, #end_date").on("input change", function() {
            fetchData();
        });
    });
</script>
@endsection