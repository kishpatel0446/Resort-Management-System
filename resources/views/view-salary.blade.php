@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Salary Details for <span class="text-primary">{{ $staff->name }}</span></h1>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">💰 Salary Payments</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Salary Date</th>
                        <th>Fixed Salary</th>
                        <th>Paid Salary</th>
                        <th>Withdrawal</th>
                        <th>Remaining Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaries as $salary)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($salary->salary_date)->format('d M, Y') }}</td>
                            <td>₹{{ number_format($salary->fixed_salary, 2) }}</td>
                            <td class="text-success">₹{{ number_format($salary->payable_salary, 2) }}</td>
                            <td class="text-danger">₹{{ number_format($salary->withdrawal, 2) }}</td>
                            <td class="text-warning">
                                @if($salary->balance_due > 0)
                                    ₹{{ number_format($salary->balance_due, 2) }} (Carry Forward)
                                @else
                                    ₹{{ number_format(abs($salary->balance_due), 2) }} (Deducted from Next Salary)
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">📜 Withdrawal History</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Amount</th>
                        <th>Withdrawal Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawals as $withdrawal)
                        <tr>
                            <td class="text-danger">₹{{ number_format($withdrawal->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($withdrawal->withdrawal_date)->format('d M, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('staff.list') }}" class="btn btn-secondary">🔙 Back to Staff List</a>
    </div>
</div>
@endsection
