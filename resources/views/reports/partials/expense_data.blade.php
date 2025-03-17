@foreach ($dailyExpenses as $expense)
<tr>
    <td>{{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}</td>
    <td>{{ $expense->category }}</td>
    <td>{{ $expense->note ?? '-' }}</td>
    <td>₹{{ number_format($expense->amount, 2) }}</td>
</tr>
@endforeach

@foreach ($kitchenPurchases as $purchase)
<tr>
    <td>{{ \Carbon\Carbon::parse($purchase->date)->format('d-m-Y') }}</td>
    <td>{{ $purchase->category }}</td>
    <td>{{ $purchase->note }}</td>
    <td>₹{{ number_format($purchase->amount, 2) }}</td>
</tr>
@endforeach

@foreach ($otherPurchases as $purchase)
<tr>
    <td>{{ \Carbon\Carbon::parse($purchase->date)->format('d-m-Y') }}</td>
    <td>{{ $purchase->category }}</td>
    <td>{{ $purchase->note }}</td>
    <td>₹{{ number_format($purchase->amount, 2) }}</td>
</tr>
@endforeach