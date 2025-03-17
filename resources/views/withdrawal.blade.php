@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-danger">💳 Record Withdrawal for {{ $staff->name }}</h1>

    <div class="card shadow-lg">
        <div class="card-header bg-danger text-white">
            <h3 class="mb-0">📄 Withdrawal Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('withdrawal.store') }}" method="POST">
                @csrf
                <input type="hidden" name="staff_id" value="{{ $staff->id }}">

                <div class="row">
                    <!-- Withdrawal Amount -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount"><strong>💰 Amount</strong></label>
                            <input type="number" name="amount" id="amount" class="form-control bg-light text-dark" placeholder="Enter withdrawal amount" required>
                        </div>
                    </div>

                    <!-- Withdrawal Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="withdrawal_date"><strong>📅 Withdrawal Date</strong></label>
                            <input type="date" name="withdrawal_date" id="withdrawal_date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-danger">✅ Record Withdrawal</button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('staff.list') }}" class="btn btn-secondary">🔙 Back to Staff List</a>
    </div>
</div>
@endsection
