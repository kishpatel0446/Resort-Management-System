<table class="table table-bordered">
    <thead>
        <tr>
            <th>Vendor Name</th>
            <th>Total Purchases</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendors as $vendor)
        <tr>
            <td>
                <a href="{{ route('reports.vendorPurchases', ['vendor_name' => $vendor->name]) }}" class="vendor-link">
                    {{ $vendor->name }}
                </a>
            </td>
            <td>{{ $vendor->total_purchases }}</td>
            <td>Rs. {{ number_format($vendor->total_amount, 2) }}</td>
        </tr>
        @endforeach

    </tbody>
</table>