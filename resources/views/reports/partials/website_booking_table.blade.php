@foreach ($websiteBookings as $booking)
<tr>
    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
    <td>{{ $booking->name }}</td>
    <td>{{ $booking->cn }}</td>
    <td>{{ $booking->adults }}</td>
    <td>{{ $booking->kids }}</td>
</tr>
@endforeach
