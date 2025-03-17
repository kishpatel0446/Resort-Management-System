@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h1 class="text-center text-primary mb-4">Other Purchases</h1>

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-box-open"></i> Purchases List</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Purchase Date</th>
                        <th>Vendor Name</th>
                        <th>Net Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                        <tr>
                            <td><span class="text-primary" style="font-weight: 500;">{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d-m-Y') }}</span></td>
                            <td><span class="text-danger" style="font-weight: 500;">{{ $purchase->vendor_name }}</span></td>
                            <td><span class="text-success" style="font-weight: 500;">₹{{ number_format($purchase->net_amount, 2) }}</span></td>
                            <td>
                                <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
