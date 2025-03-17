@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header"><a href="{{ route('daily-income.index') }}"style="color: white; text-decoration: none;">Total Income</a></div>
                <div class="card-body">
                    <h4 class="card-title">₹{{ number_format($totalIncome, 2) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header"><a href="{{ route('daily-expenses.index') }}"style="color: white; text-decoration: none;">Total Expenses</a></div>
                <div class="card-body">
                    <h4 class="card-title">₹{{ number_format($totalExpenses, 2) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header"><a href="{{ route('investments.index') }}"style="color: white; text-decoration: none;">Total Investment</a></div>
                <div class="card-body">
                    <h4 class="card-title">₹{{ number_format($totalInvestment, 2) }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Net Profit</div>
                <div class="card-body">
                    <h4 class="card-title">₹{{ number_format($netProfit, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Income vs Expenses vs Investment Chart</span>
            <button id="toggleChart" class="btn btn-primary">Pie Chart</button>
        </div>
        <div class="card-body" style="height: 500px;"> 
            <canvas id="incomeExpenseChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('incomeExpenseChart').getContext('2d');
    var currentChartType = 'bar'; 

    var chartData = {
        labels: ['Total Income', 'Total Expenses', 'Total Investment', 'Net Profit'],
        datasets: [{
            label: 'Amount in ₹',
            data: [
                {{ $totalIncome }},
                {{ $totalExpenses }},
                {{ $totalInvestment }},
                {{ $netProfit }}
            ],
            backgroundColor: ['green', 'red', 'yellow', 'blue']
        }]
    };

    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                grid: { display: false }
            },
            y: {
                beginAtZero: true
            }
        },
        datasets: {
            bar: {
                barThickness: 60, 
                maxBarThickness: 100,
                minBarLength: 10 
            }
        }
    };

    var myChart = new Chart(ctx, {
        type: currentChartType,
        data: chartData,
        options: chartOptions
    });

    document.getElementById('toggleChart').addEventListener('click', function() {
        myChart.destroy(); 

        currentChartType = (currentChartType === 'bar') ? 'pie' : 'bar';

        this.textContent = (currentChartType === 'bar') ? 'Pie Chart' : 'Bar Chart';

        myChart = new Chart(ctx, {
            type: currentChartType,
            data: chartData,
            options: chartOptions
        });
    });
});
</script>
@endsection
