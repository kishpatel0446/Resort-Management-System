@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Book Room #{{ $room->room_number }}</h1>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('rooms.create-offline-booking') }}">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">

        <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="customer_phone">Phone Number:</label>
            <input type="text" name="customer_phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="check_in">Check-in Date:</label>
            <input type="date" name="check_in" class="form-control" value="{{ request('check_in_date') }}" required>
        </div>

        <div class="form-group">
            <label for="check_out">Check-out Date:</label>
            <input type="date" name="check_out" class="form-control" value="{{ request('check_out_date') }}" required>
        </div>

        <div class="form-group">
            <label for="adults">Adults:</label>
            <input type="number" name="adults" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label for="kids">Kids:</label>
            <input type="number" name="kids" class="form-control" min="0" required>
        </div>

        <div class="form-group">
            <label for="extra_bed">Extra Beds:</label>
            <input type="number" name="extra_bed" class="form-control" min="0">
        </div>

        <div class="form-group">
            <label for="price">Price per Night:</label>
            <input type="number" name="price" class="form-control" value="{{ $room->price_per_night }}" required>
        </div>

        <div class="form-group">
            <label for="extra_bed_price">Extra Bed Price:</label>
            <input type="number" name="extra_bed_price" class="form-control" min="0">
        </div>

        <div class="form-group">
            <label for="discount">Discount:</label>
            <input type="number" name="discount" class="form-control" min="0">
        </div>

        <div class="form-group">
            <label for="advance">Advance Payment:</label>
            <input type="number" name="advance" class="form-control" min="0">
        </div>

        <button type="submit" class="btn btn-success">Confirm Booking</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection