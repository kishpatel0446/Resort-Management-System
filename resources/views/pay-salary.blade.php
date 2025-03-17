@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-primary">💰 Pay Salary for {{ $staff->name }}</h1>

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @php
        $salaryPaid = \App\Models\Salary::where('staff_id', $staff->id)
            ->whereMonth('salary_date', now()->month)
            ->whereYear('salary_date', now()->year)
            ->where('status', 'Paid')
            ->exists();
    @endphp

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">📄 Salary Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('salary.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fixed_salary"><strong>💵 Fixed Salary</strong></label>
                            <input type="text" name="fixed_salary" id="fixed_salary" value="{{ $fixedSalary }}" class="form-control bg-light text-dark" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="withdrawal"><strong>💳 Total Withdrawals</strong></label>
                            <input type="text" name="withdrawal" id="withdrawal" value="{{ $withdrawals->sum('amount') }}" class="form-control bg-warning text-dark" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="payable_salary"><strong>🤑 Payable Salary</strong></label>
                            <input type="text" name="payable_salary" id="payable_salary" value="{{ $payableSalary }}" class="form-control bg-success text-white" readonly>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="staff_id" value="{{ $staff->id }}">

                <div class="form-group mt-3">
                    <label for="salary_date"><strong>📅 Salary Date</strong></label>
                    <input type="date" name="salary_date" id="salary_date" class="form-control" required>
                </div>

                <div class="text-center mt-4">
                    @if($salaryPaid)
                        <button type="button" class="btn btn-lg btn-secondary" disabled>✅ Salary Already Paid</button>
                    @else
                        <button type="submit" class="btn btn-lg btn-success">✅ Pay Salary</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-5 shadow">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">📜 Withdrawal History</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>💰 Withdrawal Amount</th>
                        <th>📅 Withdrawal Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withdrawals as $withdrawal)
                        <tr>
                            <td class="text-danger font-weight-bold">₹{{ number_format($withdrawal->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($withdrawal->withdrawal_date)->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('staff.list') }}" class="btn btn-dark">🔙 Back to Staff List</a>
    </div>
    <br>
</div>
@endsection
