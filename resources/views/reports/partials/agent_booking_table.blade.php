
    @foreach ($agentBookings as $booking)
    <tr>
        <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
        <td>{{ $booking->agentname }}</td>
        <td>{{ $booking->cn }}</td>
        <td>{{ $booking->adults }}</td>
        <td>{{ $booking->kids }}</td>
        <td>{{ $booking->netamount }}</td>
    </tr>
    @endforeach
