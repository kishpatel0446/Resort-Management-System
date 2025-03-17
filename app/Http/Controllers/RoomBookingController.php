<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\OnlineBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomBookingController extends Controller
{
    public function showOnlineBookingForm()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('roombooking', compact('rooms'));
    }

    public function createOnlineBooking(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'kids' => 'required|integer|min:0',
            'extra_bed' => 'nullable|integer|min:0',
        ]);

        $price_per_night = 6800;
        $extra_bed_price = 500;

        $checkInDate = new \DateTime($request->input('check_in'));
        $checkOutDate = new \DateTime($request->input('check_out'));
        $nights = $checkInDate->diff($checkOutDate)->days;

        $num_rooms = $request['num_rooms'];
        $room_cost = $num_rooms * $nights * $price_per_night;
        $extra_bed_cost = $request->input('extra_bed', 0) * $extra_bed_price * $nights;
        $total_price = $room_cost + $extra_bed_cost;

        $discount = 0;

        $advance = round($total_price * 0.5, 2);

        $netamount = round($total_price - $discount, 2);

        $booking = new OnlineBooking([
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'adults' => $request->input('adults'),
            'kids' => $request->input('kids'),
            'extra_bed' => $request->input('extra_bed', 0),
            'num_rooms' => $num_rooms,
            'status' => 'Pending',
            'booked_by' => 'Online',

            'price' => $price_per_night,
            'extra_bed_price' => $extra_bed_cost,
            'total_price' => $total_price,
            'discount' => $discount,
            'advance' => $advance,
            'netamount' => $netamount,
        ]);

        $booking->save();

        return redirect()->to('perks')->with('success', 'Room booked successfully!!\n Confirmation call will be done soon by us.\n Thank you for choosing Ambik Riverside Camp & Resort!!');
    }

    public function review(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('roombooking')->with('error', 'Invalid request method.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'kids' => 'nullable|integer|min:0',
            'num_rooms' => 'required|integer|min:1',
            'extra_bed' => 'nullable|integer|min:0',
        ]);

        $price_per_night = 6800;
        $extra_bed_price = 500;

        $checkInDate = new \DateTime($validated['check_in']);
        $checkOutDate = new \DateTime($validated['check_out']);
        $nights = $checkInDate->diff($checkOutDate)->days;

        $num_rooms = $validated['num_rooms'];
        $extra_bed = $validated['extra_bed'] ?? 0;

        $room_cost = $num_rooms * $nights * $price_per_night;
        $extra_bed_cost = $extra_bed * $extra_bed_price * $nights;

        $total_price = $room_cost + $extra_bed_cost;
        $discount = 0;
        $advance = round($total_price * 0.5, 2);
        $netamount = round($total_price - $discount, 2);
        $pending = $netamount - $advance;

        return view('review', compact(
            'validated',
            'price_per_night',
            'extra_bed_price',
            'total_price',
            'discount',
            'advance',
            'netamount',
            'pending'
        ));
    }

    public function createOfflineBooking(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'kids' => 'required|integer|min:0',
            'extra_bed' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'extra_bed_price' => 'nullable|numeric|min:0',
            'advance' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
        ]);

        $room = Room::findOrFail($request->input('room_id'));

        if ($room->maintenance) {
            return redirect()->back()->with('error', 'Room is currently under maintenance and cannot be booked.');
        }

        if (!$room->isAvailableForDateRange($request->input('check_in'), $request->input('check_out'))) {
            return redirect()->back()->with('error', 'Room is not available for the selected dates.');
        }

        $pricePerNight = $request->input('price');
        $extraBedCost = $request->input('extra_bed', 0) * $request->input('extra_bed_price', 0);
        $totalDays = \Carbon\Carbon::parse($request->input('check_in'))
            ->diffInDays(\Carbon\Carbon::parse($request->input('check_out')));
        $totalPrice = ($pricePerNight * $totalDays) + $extraBedCost;
        $discount = $request->input('discount', 0);
        $advance = $request->input('advance', 0);
        $netAmount = $totalPrice - $discount;

        $booking = new RoomBooking([
            'room_id' => $room->id,
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'adults' => $request->input('adults'),
            'kids' => $request->input('kids'),
            'extra_bed' => $request->input('extra_bed', 0),
            'price' => $pricePerNight,
            'extra_bed_price' => $request->input('extra_bed_price', 0),
            'total_price' => $totalPrice,
            'advance' => $advance,
            'discount' => $discount,
            'netamount' => $netAmount,
            'status' => 'Booked',
            'booked_by' => 'Offline',
        ]);

        $booking->save();

        $room->update(['is_available' => 0]);

        return redirect()->route('rooms.index')->with('success', "Room {$room->room_number} booked successfully.");
    }

    public function allotRoomToBooking(Request $request, $bookingId)
    {
        $request->validate([
            'room_id' => 'required|array',
            'room_id.*' => 'exists:rooms,id',
        ]);

        $booking = OnlineBooking::findOrFail($bookingId);

        if ($booking->status === 'confirmed') {
            return response()->json(['success' => false, 'message' => 'Rooms are already allotted for this booking.'], 400);
        }

        $selectedRooms = Room::whereIn('id', $request->input('room_id'))->get();

        if ($selectedRooms->count() != $booking->num_rooms) {
            return response()->json([
                'success' => false,
                'message' => "You must select exactly {$booking->num_rooms} rooms."
            ], 400);
        }

        foreach ($selectedRooms as $room) {
            if ($room->maintenance) {
                return response()->json([
                    'success' => false,
                    'message' => "Room {$room->room_number} is under maintenance."
                ], 400);
            }

            if (!$room->isAvailableForDateRange($booking->check_in, $booking->check_out)) {
                return response()->json([
                    'success' => false,
                    'message' => "Room {$room->room_number} is not available for the selected dates."
                ], 400);
            }
        }

        $booking->rooms()->attach($selectedRooms->pluck('id'));

        $booking->status = 'confirmed';
        $booking->save();

        Room::whereIn('id', $selectedRooms->pluck('id'))->update(['is_available' => 0]);

        $roomNumbers = $selectedRooms->pluck('room_number')->implode(', ');

        return response()->json([
            'success' => true,
            'message' => "Rooms allotted successfully to booking {$booking->id}.",
            'room_numbers' => $roomNumbers
        ]);
    }

    public function indexOnlineBookings()
    {
        $bookings = OnlineBooking::with('room')->get();
        return view('rooms.online_booking', compact('bookings'));
    }

    public function showOfflineBookingForm(Request $request)
    {
        $room = Room::findOrFail($request->room_id);

        return view('rooms.create_offline_booking', compact('room'));
    }

    public function showAllBookings()
    {

        $offlineBookings = RoomBooking::with('room')->get();
        $onlineBookings = OnlineBooking::with('rooms')->get();

        return view('rooms.booking_details', compact('offlineBookings','onlineBookings'));
    }

    

    public function showOnlineBookings()
    {
        $onlineBookings = OnlineBooking::with('rooms')
            ->where('status', '!=', 'checked out')
            ->get();


        $availableRooms = Room::where('is_available', 1)
            ->where('maintenance', 0)
            ->get();

        return view('rooms.online_booking', compact('onlineBookings', 'availableRooms'));
    }

    public function checkoutBooking($bookingId, Request $request)
    {
        $booking = RoomBooking::with('room')->find($bookingId);

        if ($booking) {
            $booking->update([
                'status' => 'Checked Out',
                'checkout_date_time' => now(),
            ]);

            if ($booking->room) {
                $booking->room->update(['is_available' => true]);
            }
        } else {
            $booking = OnlineBooking::with('rooms')->findOrFail($bookingId);

            $booking->update([
                'status' => 'Checked Out',
                'checkout_date_time' => now(),
            ]);

            if ($booking->rooms->isEmpty()) {
                return redirect()->back()->with('error', 'No rooms found for this booking.');
            }

            foreach ($booking->rooms as $room) {
                $room->update(['is_available' => true]);
            }
        }

        return redirect()->route('rooms.occupied', [
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
        ])->with('success', 'Checked out successfully.');
    }
}
