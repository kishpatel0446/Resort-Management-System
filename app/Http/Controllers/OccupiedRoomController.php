<?php

namespace App\Http\Controllers;

use App\Models\OccupiedRoom;
use App\Models\RoomBooking;
use App\Models\Room;
use Illuminate\Http\Request;

class OccupiedRoomController extends Controller
{
   public function index()
{

    return view('rooms.occupied_rooms');
}


    public function store(Request $request)
{
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:15',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
    ]);

    $room = Room::findOrFail($request->input('room_id'));

    // Check if the room is already occupied or booked
    $isOccupied = OccupiedRoom::where('room_id', $room->id)
        ->where('check_out', '>', now()) // Still occupied
        ->exists();

    $isBooked = RoomBooking::where('room_id', $room->id)
        ->where('check_in', '<', $request->input('check_out'))
        ->where('check_out', '>', $request->input('check_in'))
        ->exists();

    if ($isOccupied || $isBooked) {
        return redirect()->back()->with('error', 'This room is already occupied or booked for the selected dates.');
    }

    // Store room as occupied
    $occupiedRoom = new OccupiedRoom([
        'room_id' => $room->id,
        'customer_name' => $request->input('customer_name'),
        'customer_phone' => $request->input('customer_phone'),
        'check_in' => $request->input('check_in'),
        'check_out' => $request->input('check_out'),
    ]);
    $occupiedRoom->save();

    // Mark the room as unavailable
    $room->update(['is_available' => false]);

    return redirect()->route('rooms.occupied_rooms')->with('success', "Room {$room->room_number} marked as occupied.");
}


    public function checkout($occupiedRoomId)
    {
        $occupiedRoom = OccupiedRoom::findOrFail($occupiedRoomId);

        // Mark room as available after checkout
        $room = $occupiedRoom->room;
        $room->update(['is_available' => true]);

        // Delete the occupied room record
        $occupiedRoom->delete();

        return redirect()->route('rooms.occupied_rooms')->with('success', 'Checked out and room is now available.');
    }
}
