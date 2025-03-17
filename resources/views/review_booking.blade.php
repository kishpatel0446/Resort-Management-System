@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Review Your Booking Details</h2>

    <table class="table table-bordered mt-3">
        <tr>
            <th>Name</th>
            <td>{{ $data['customer_name'] }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $data['customer_phone'] }}</td>
        </tr>
        <tr>
            <th>Check-in Date</th>
            <td>{{ $data['check_in'] }}</td>
        </tr>
        <tr>
            <th>Check-out Date</th>
            <td>{{ $data['check_out'] }}</td>
        </tr>
        <tr>
            <th>Adults</th>
            <td>{{ $data['adults'] }}</td>
        </tr>
        <tr>
            <th>Kids</th>
            <td>{{ $data['kids'] }}</td>
        </tr>
        <tr>
            <th>Number of Rooms</th>
            <td>{{ $data['num_rooms'] }}</td>
        </tr>
        <tr>
            <th>Need Extra Bed?</th>
            <td>{{ isset($data['extra_bed_check']) ? 'Yes' : 'No' }}</td>
        </tr>
        @if(isset($data['extra_bed_check']))
        <tr>
            <th>Extra Beds</th>
            <td>{{ $data['extra_bed'] }}</td>
        </tr>
        @endif
        <tr>
            <th>Total Amount</th>
            <td>₹{{ number_format($total_amount, 2) }}</td>
        </tr>
        @if($extra_bed_price > 0)
        <tr>
            <th>Extra Bed Charges</th>
            <td>₹{{ number_format($extra_bed_price, 2) }}</td>
        </tr>
        @endif
        <tr>
            <th>Net Amount</th>
            <td><strong>₹{{ number_format($net_amount, 2) }}</strong></td>
        </tr>
    </table>

    <div class="mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-warning">Edit Details</a>

        <form action="{{ route('book-room.store') }}" method="POST" class="d-inline">
            @csrf
            @foreach ($data as $key => $value)
                @if (is_array($value))
                    @foreach ($value as $subKey => $subValue)
                        <input type="hidden" name="{{ $key }}[{{ $subKey }}]" value="{{ $subValue }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach

            <input type="hidden" name="total_amount" value="{{ $total_amount }}">
            <input type="hidden" name="extra_bed_price" value="{{ $extra_bed_price }}">
            <input type="hidden" name="net_amount" value="{{ $net_amount }}">

            <button type="submit" class="btn btn-success">Confirm & Book</button>
        </form>
    </div>
</div>
<br>
@endsection
