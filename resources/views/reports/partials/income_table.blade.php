<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Date</th>
            <th>Source</th>
            <th>Note</th>
            <th>Amount (₹)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incomeData as $income)
        <tr>
            <td>{{ \Carbon\Carbon::parse($income->date)->format('d-m-Y') }}</td>
            <td>{{ $income->source }}</td>
            <td>{{ $income->note }}</td>
            <td>₹{{ number_format($income->amount, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="table-success">
            <th colspan="3">Total Income</th>
            <th>₹{{ number_format($totalIncome, 2) }}</th>
        </tr>
    </tfoot>
</table>