@extends('layouts.admin')

@section('content')
    <h2 class="custom-heading">Add Room</h2>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
        </div>
        <div class="form-group">
    <label for="price_per_night">Price per Night</label>
    <input type="number" name="price_per_night" id="price_per_night" class="form-control" step="0.01" required>
</div>

        <button type="submit" class="btn btn-primary">Add Room</button>
    </form>
   
@endsection

