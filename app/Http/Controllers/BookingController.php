<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showBookingForm()
    {
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
    
        return redirect()->route('invoice.create', ['bookingId' => $booking->id]);
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
    
}
