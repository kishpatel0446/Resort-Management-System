@if($purchases->isNotEmpty() || $kitchenPurchases->isNotEmpty())
    <h5>📦 Regular Purchases</h5>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Purchase ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                @foreach($purchase->items as $item)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rs. {{ number_format($item->rate, 2) }}</td>
                    <td>Rs. {{ number_format($item->total_amount, 2) }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <h5>🍽️ Kitchen Purchases</h5>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Purchase ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kitchenPurchases as $purchase)
                @foreach($purchase->items as $item)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rs. {{ number_format($item->rate, 2) }}</td>
                    <td>Rs. {{ number_format($item->total_amount, 2) }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <h4 class="text-end">🛒 Total Purchases: {{ $grandTotalPurchases }}</h4>
    <h4 class="text-end">💰 Total Amount: Rs. {{ number_format($grandTotalAmount, 2) }}</h4>
@else
    <div class="text-danger">No items found for this date.</div>
@endif
