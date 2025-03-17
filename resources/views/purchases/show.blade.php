@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4 text-primary">Other Purchase Details</h1>

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-box-open"></i> Purchase Details</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><i class="fas fa-calendar-alt"></i> <strong>Purchase Date:</strong> <span class="text-primary" style="font-weight: bold;">{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d-m-Y') }}</span></p>
                </div>
                <div class="col-md-6">
                    <p><i class="fas fa-user-tie"></i> <strong>Vendor Name:</strong> <span class="text-danger" style="font-weight: bold;">{{ $purchase->vendor_name }}</span></p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <p><i class="fas fa-money-bill-wave"></i> <strong>Net Amount:</strong> <span class="text-success" style="font-weight: bold;">₹{{ number_format($purchase->net_amount, 2) }}</span></p>
                </div>
            </div>

            <h4 class="text-center mt-4">Items Purchased</h4>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Item Name</th>
                        <th>Rate</th>
                        <th>Quantity/kg</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchase->items as $item)
                        <tr>
                            <td><i class="fas fa-caret-right"></i> {{ $item->item_name }}</td>
                            <td>₹{{ number_format($item->rate, 2) }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>₹{{ number_format($item->rate * $item->qty, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('purchases.index') }}" class="btn btn-secondary btn-lg">
            <i class="fas fa-arrow-left"></i> Back to Purchases
        </a>
    </div>
</div>
@endsection
