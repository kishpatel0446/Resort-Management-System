<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\OnlineBooking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $checkInDate = $request->input('check_in_date', now()->toDateString());
        $checkOutDate = $request->input('check_out_date', now()->addDay()->toDateString());

        $bookedRoomIds = RoomBooking::where('status', 'Booked')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where('check_in', '<', $checkOutDate)
                    ->where('check_out', '>', $checkInDate);
            })
            ->pluck('room_id');

        $bookedOnlineRoomIds = DB::table('booking_room')
            ->join('online_bookings', 'booking_room.online_booking_id', '=', 'online_bookings.id')
            ->where('online_bookings.status', 'confirmed')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where('online_bookings.check_in', '<', $checkOutDate)
                    ->where('online_bookings.check_out', '>', $checkInDate);
            })
            ->pluck('booking_room.room_id');

        $bookedRooms = $bookedRoomIds->merge($bookedOnlineRoomIds)->unique();

        $rooms = Room::whereNotIn('id', $bookedRooms)->where('maintenance', false)->get();

        return view('rooms.index', compact('rooms'));
    }

    public function allotRoom(Request $request, $roomId)
    {
        $room = Room::findOrFail($roomId);
        $booking = new RoomBooking([
            'room_id' => $room->id,
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'adults' => $request->input('adults'),
            'kids' => $request->input('kids'),
            'extra_bed' => $request->input('extra_bed'),
            'status' => 'Room Allotted',
            'booked_by' => 'Admin'
        ]);
        $booking->save();

        $room->update(['is_available' => false]);
        return redirect()->route('rooms.index')->with('success', 'Room has been allotted.');
    }

    public function onlineBookings()
    {
        $bookings = RoomBooking::where('booked_by', 'online')->get();
        return view('rooms.online-bookings', compact('bookings'));
    }

    public function occupiedRooms(Request $request)
    {
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');

        $offlineBookingsQuery = RoomBooking::where('status', '!=', 'Checked Out')
            ->when($checkInDate && $checkOutDate, function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->whereBetween('check_in', [$checkInDate, $checkOutDate])
                        ->orWhereBetween('check_out', [$checkInDate, $checkOutDate]);
                });
            })
            ->with('room');

        $onlineBookingsQuery = OnlineBooking::where('status', 'confirmed')
            ->whereHas('rooms', function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->whereBetween('online_bookings.check_in', [$checkInDate, $checkOutDate])
                        ->orWhereBetween('online_bookings.check_out', [$checkInDate, $checkOutDate]);
                });
            })
            ->with('rooms');

        $offlineBookings = $offlineBookingsQuery->get();
        $onlineBookings = $onlineBookingsQuery->get();

        $occupiedRooms = $offlineBookings->map(function ($booking) {
            return [
                'room_number' => $booking->room ? $booking->room->room_number : 'N/A',
                'customer_name' => $booking->customer_name,
                'customer_phone' => $booking->customer_phone,
                'check_in' => $booking->check_in,
                'check_out' => $booking->check_out,
                'booking_id' => $booking->id,
                'is_online' => false,
            ];
        });

        foreach ($onlineBookings as $onlineBooking) {
            foreach ($onlineBooking->rooms as $room) {
                $occupiedRooms->push([
                    'room_number' => $room->room_number,
                    'customer_name' => $onlineBooking->customer_name,
                    'customer_phone' => $onlineBooking->customer_phone,
                    'check_in' => $onlineBooking->check_in,
                    'check_out' => $onlineBooking->check_out,
                    'booking_id' => $onlineBooking->id,
                    'is_online' => true,
                ]);
            }
        }

        return view('rooms.occupied_rooms', compact('occupiedRooms'));
    }

    public function maintenance($roomId)
    {
        $room = Room::findOrFail($roomId);
        $room->update(['maintenance' => 1]);

        return redirect()->route('rooms.details')->with('success', 'Room is under maintenance.');
    }

    public function available($roomId)
    {
        $room = Room::findOrFail($roomId);
        $room->update(['is_available' => true]);
        $room->update(['maintenance' => 0]);

        return redirect()->route('rooms.details')->with('success', 'Room is now available.');
    }

    public function edit($roomId)
    {
        $room = Room::findOrFail($roomId);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $roomId)
    {
        $request->validate([
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric|min:0',
        ]);

        $room = Room::findOrFail($roomId);
        $room->update([
            'room_number' => $request->input('room_number'),
            'room_type' => $request->input('room_type'),
            'capacity' => $request->input('capacity'),
            'price_per_night' => $request->input('price_per_night'),
        ]);

        return redirect()->route('rooms.details')->with('success', 'Room updated successfully.');
    }

    public function destroy($roomId)
    {
        $room = Room::findOrFail($roomId);
        $room->delete();

        return redirect()->route('rooms.details')->with('success', 'Room deleted successfully.');
    }

    public function roomDetails()
    {
        $rooms = Room::all();
        return view('rooms.room_details', compact('rooms'));
    }
}
