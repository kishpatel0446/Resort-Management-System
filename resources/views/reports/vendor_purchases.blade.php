@extends('layouts.admin')

@section('content')

<style>
    .report-container {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
        background: white;
    }

    .table thead {
        background:rgb(8, 0, 255);
        color: white;
        font-weight: bold;
        text-transform: uppercase;
    }

    .table tbody tr:nth-child(even) {
        background:rgb(240, 243, 247);
    }

    .table tbody tr:hover {
        background: rgba(0, 123, 255, 0.1);
    }

    th, td {
        padding: 12px;
        vertical-align: middle;
        text-align: center;
    }

    .fw-bold {
        font-weight: bold;
    }

    .text-success {
        color: #28a745;
    }

    .table-header {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 15px;
    }

    .back-button {
        display: inline-block;
        padding: 10px 15px;
        background: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: 0.3s;
    }

    .back-button:hover {
        background: #495057;
        color: white;
    }

    .purchase-section {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .purchase-section h4 {
        background: #007BFF;
        color: white;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 15px;
    }
</style>

<div class="container mt-4">
    <div class="report-container">
        <h2 class="text-center mb-4">📋 Purchases Record for <span class="fw-bold">{{ $vendor_name }}</span></h2>

        <a href="{{ route('reports.purchase') }}" class="back-button">⬅ Back to Reports</a>

        @if($purchases->isNotEmpty())
        <div class="purchase-section">
            <h4>🛒 Regular Purchases</h4>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                    <tr>
                        <td class="fw-bold">{{ $purchase->id }}</td>
                        <td>{{ date('d-m-Y', strtotime($purchase->created_at)) }}</td>
                        <td class="text-success">Rs. {{ number_format($purchase->net_amount, 2) }}</td>
                        <td>
                            <ul>
                                @foreach($purchase_items[$purchase->id] ?? [] as $item)
                                <li>{{ $item->item_name }} - {{ $item->qty }} x Rs. {{ number_format($item->rate, 2) }} = Rs. {{ number_format($item->total_amount, 2) }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        @if($kitchen_purchases->isNotEmpty())
        <div class="purchase-section">
            <h4>👨‍🍳 Kitchen Purchases</h4>
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kitchen_purchases as $purchase)
                    <tr>
                        <td class="fw-bold">{{ $purchase->id }}</td>
                        <td>{{ date('d-m-Y', strtotime($purchase->created_at)) }}</td>
                        <td class="text-success">Rs. {{ number_format($purchase->net_amount, 2) }}</td>
                        <td>
                            <ul>
                                @foreach($kitchen_purchase_items[$purchase->id] ?? [] as $item)
                                <li>{{ $item->item_name }} - {{ $item->qty }} x Rs. {{ number_format($item->rate, 2) }} = Rs. {{ number_format($item->total_amount, 2) }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>
</div>

@endsection
