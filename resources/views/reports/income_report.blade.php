@extends('layouts.admin')

@section('title', 'Income Report')

@section('content')
<div class="container">
    <h2>Income Report</h2>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.account') ? 'active' : '' }}" href="{{ route('reports.account') }}">Account Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reports.income') }}">Income Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.expense') }}">Expense Report</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reports.investment') }}">Investment Report</a>
        </li>
    </ul>


    <form id="filterForm" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="source">Source</label>
                <input type="text" id="source" name="source" class="form-control" placeholder="Enter source">
            </div>
            <div class="col-md-3">
                <label for="note">Note</label>
                <input type="text" id="note" name="note" class="form-control" placeholder="Enter note">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <label for="min_amount">Min Amount (₹)</label>
                <input type="number" id="min_amount" name="min_amount" class="form-control" placeholder="Min amount">
            </div>
            <div class="col-md-3">
                <label for="max_amount">Max Amount (₹)</label>
                <input type="number" id="max_amount" name="max_amount" class="form-control" placeholder="Max amount">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="button" id="resetFilters" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>


    <div id="incomeTable">
        @include('reports.partials.income_table', ['incomeData' => $incomeData, 'totalIncome' => $totalIncome])
    </div>
</div>

{{-- AJAX Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchFilteredData() {
            $.ajax({
                url: "{{ route('reports.income') }}",
                method: "GET",
                data: $("#filterForm").serialize(),
                success: function(response) {
                    $("#incomeTable").html(response);
                }
            });
        }

        $("#filterForm input").on("input change", function() {
            fetchFilteredData();
        });

        $("#resetFilters").click(function() {
            $("#filterForm")[0].reset();
            fetchFilteredData();
        });
    });
</script>
@endsection