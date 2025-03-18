<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Quantity Purchased</th>
            <th>Total Cost</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->total_quantity }}</td>
            <td>Rs. {{ number_format($item->total_cost, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
