@foreach ($investmentData as $investment)
<tr>
    <td>{{ \Carbon\Carbon::parse($investment->date)->format('d-m-Y') }}</td>
    <td>{{ $investment->investor_name }}</td>
    <td>{{ $investment->note }}</td>
    <td>₹{{ number_format($investment->amount, 2) }}</td>
</tr>
@endforeach
