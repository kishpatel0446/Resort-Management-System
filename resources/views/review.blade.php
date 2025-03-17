@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Review Your Booking</h2>

    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td>{{ $validated['customer_name'] }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $validated['customer_phone'] }}</td>
        </tr>
        <tr>
            <th>Check-in Date:</th>
            <td>{{ $validated['check_in'] }}</td>
        </tr>
        <tr>
            <th>Check-out Date:</th>
            <td>{{ $validated['check_out'] }}</td>
        </tr>
        <tr>
            <th>Number of Nights:</th>
            <td>
                @php
                    $nights = (new DateTime($validated['check_in']))->diff(new DateTime($validated['check_out']))->days;
                @endphp
                {{ $nights }}
            </td>
        </tr>
        <tr>
            <th>Adults:</th>
            <td>{{ $validated['adults'] }}</td>
        </tr>
        <tr>
            <th>Kids:</th>
            <td>{{ $validated['kids'] }}</td>
        </tr>
        <tr>
            <th>Rooms:</th>
            <td>{{ $validated['num_rooms'] }}</td>
        </tr>
        <tr>
            <th>Room Price per Night:</th>
            <td>₹{{ number_format($price_per_night, 2) }}</td>
        </tr>
        <tr>
            <th>Total Room Price:</th>
            <td>₹{{ number_format($validated['num_rooms'] * $price_per_night * $nights, 2) }}</td>
        </tr>
        <tr>
            <th>Extra Bed:</th>
            <td>{{ $validated['extra_bed'] ?? 0 }}</td>
        </tr>
        <tr>
            <th>Extra Bed Price per Night:</th>
            <td>₹{{ number_format($extra_bed_price, 2) }}</td>
        </tr>
        <tr>
            <th>Total Extra Bed Cost:</th>
            <td>
                @php
                    $extra_beds = $validated['extra_bed'] ?? 0;
                    $extra_bed_cost = $extra_beds * $extra_bed_price * $nights;
                @endphp
                ₹{{ number_format($extra_bed_cost, 2) }}
            </td>
        </tr>
        <tr>
            <th>Total Price:</th>
            <td><strong>₹{{ number_format($total_price, 2) }}</strong></td>
        </tr>
        <tr>
            <th>Discount:</th>
            <td>₹{{ number_format($discount, 2) }}</td>
        </tr>
        <tr>
            <th>Advance Payment:</th>
            <td>₹{{ number_format($advance, 2) }}</td>
        </tr>
        <tr>
            <th>Pending Amount:</th>
            <td>
                @php
                    $pending = $netamount - $advance;
                @endphp
                ₹{{ number_format($pending, 2) }}
            </td>
        </tr>
        <tr>
            <th>Net Amount Payable:</th>
            <td><strong>₹{{ number_format($netamount, 2) }}</strong></td>
        </tr>
    </table>

    <form action="{{ route('rooms.create-online-booking') }}" method="POST">
        @csrf
        @foreach ($validated as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <input type="hidden" name="price" value="{{ $price_per_night }}">
        <input type="hidden" name="extra_bed_price" value="{{ $extra_bed_price }}">
        <input type="hidden" name="total_price" value="{{ $total_price }}">
        <input type="hidden" name="discount" value="{{ $discount }}">
        <input type="hidden" name="advance" value="{{ $advance }}">
        <input type="hidden" name="netamount" value="{{ $netamount }}">
        <input type="hidden" name="pending" value="{{ $pending }}">

        <button type="submit" class="btn btn-success">Confirm Booking</button>
    </form>
</div>
<br>
@endsection
