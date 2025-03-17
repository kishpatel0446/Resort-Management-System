@extends('layouts.admin')

@section('content')
    <h2 class="custom-heading">Edit Room</h2>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control" value="{{ $room->room_number }}" required>
        </div>
        <div class="form-group">
            <label for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control" value="{{ $room->room_type }}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $room->capacity }}" required>
        </div>
        <div class="form-group">
            <label for="price_per_night">Price per Night</label>
            <input type="number" name="price_per_night" id="price_per_night" class="form-control" value="{{ $room->price_per_night }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
@endsection
