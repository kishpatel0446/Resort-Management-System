<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\SchoolBooking;
use App\Models\AdminBooking;
use App\Models\AgentBooking;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    public function showBookingForm(Request $request)
    {
        if (!session()->has('user')) {
            return redirect()->route('user.login')->with('error', 'Please login first.');
        }
        return view('bookings');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mo' => 'required|string|max:15',
            'amo' => 'nullable|string|max:15',
            'date' => 'required|date',
            'time' => 'required|string',
            'kids' => 'required|integer|min:0',
            'adl' => 'required|integer|min:0',
        ]);

        $rates = $this->getRatesByTimeSlot($validated['time']);

        $total_kids = $validated['kids'] * ($rates['rate_adults'] * 0.7);
        $total_adults = $validated['adl'] * $rates['rate_adults'];
        $total_amount = $total_kids + $total_adults;
        $discount = 0;
        $net_amount = $total_amount - $discount;

        $booking = Booking::create([
            'name' => $validated['name'],
            'cn' => $validated['mo'],
            'acn' => $validated['amo'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'kids' => $validated['kids'],
            'adults' => $validated['adl'],
            'kids_rate' => $rates['rate_adults'] * 0.7,
            'adults_rate' => $rates['rate_adults'],
            'amount' => $total_amount,
            'advance' => 0,
            'discount' => $discount,
            'netamount' => $net_amount,
            'Status' => 'Pending',
        ]);

        session()->flash('success', 'Booking confirmed!');

        return redirect()->route('invoice.create', ['bookingId' => $booking->id, 'type' => 'booking']);
    }


    private function getRatesByTimeSlot($timeSlot)
    {
        switch ($timeSlot) {
            case '09 to 09':
                return ['rate_adults' => 1500];
            case '09 to 05':
                return ['rate_adults' => 1200];
            case '11 to 09':
                return ['rate_adults' => 1350];
            case '04 to 09':
                return ['rate_adults' => 850];
            default:
                return ['rate_adults' => 0];
        }
    }

    public function viewBookingForm()
    {
        return view('view_bookings');
    }


    public function fetchBookings(Request $request)
    {
        $phone = session('user')['mobile'];

        $bookings = Booking::where('cn', $phone)->orderBy('date', 'desc')->get()->map(function ($b) {
            return [
                'id' => $b->id,
                'name' => $b->name,
                'cn' => $b->cn,
                'date' => $b->date,
                'adults' => $b->adults,
                'kids' => $b->kids,
                'netamount' => $b->netamount,
                'type' => 'Online Booking'
            ];
        });

        $adminBookings = AdminBooking::where('cn', $phone)->orderBy('date', 'desc')->get()->map(function ($b) {
            return [
                'id' => $b->id,
                'name' => $b->name,
                'cn' => $b->cn,
                'date' => $b->date,
                'adults' => $b->adults,
                'kids' => $b->kids,
                'netamount' => $b->netamount,
                'type' => 'Offline Booking'
            ];
        });

        $agentBookings = AgentBooking::where('cn', $phone)->orderBy('date', 'desc')->get()->map(function ($b) {
            return [
                'id' => $b->id,
                'name' => $b->agentname,
                'cn' => $b->cn,
                'date' => $b->date,
                'adults' => $b->adults,
                'kids' => $b->kids,
                'netamount' => $b->netamount,
                'type' => 'Agent Booking'
            ];
        });

        $schoolBookings = SchoolBooking::where('cn', $phone)->orderBy('date', 'desc')->get()->map(function ($b) {
            return [
                'id' => $b->id,
                'name' => $b->sname,
                'cn' => $b->cn,
                'date' => $b->date,
                'adults' => $b->teacher,
                'kids' => $b->stud,
                'netamount' => $b->netamount,
                'type' => 'School Booking'
            ];
        });

        $allBookings = collect()
            ->concat($bookings)
            ->concat($adminBookings)
            ->concat($agentBookings)
            ->concat($schoolBookings)
            ->sortByDesc('date')
            ->values();

        return response()->json([
            'success' => true,
            'bookings' => $allBookings
        ]);
    }
}
