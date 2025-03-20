<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolBooking;

class SchoolBookingController extends Controller
{
    public function showBookingForm()
    {
        if (!session()->has('user')) {
            return redirect()->route('user.login')->with('error', 'Please login first.');
        }
        return view('schoolbooking');  
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'sname' => 'required|string',
            'addr' => 'required|string',
            'cn' => 'required|string|max:10',
            'date' => 'required|date',
            'time' => 'required|string',
            'stud' => 'required|integer|min:0',
            'teacher' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0', // Allow discount input
        ]);
    
        // Get rate from selected time slot
        $rates = [
            '9:30 to 05 (RS.675)' => 675,
            '9:30 to 05 (RS.700)' => 700,
            '9:30 to 09 (RS.900)' => 900,
        ];
    
        $rate = $rates[$validated['time']] ?? 0; // Get rate, default 0 if not found
    
        // Calculate number of complimentary teachers (1 per 20 students)
        $complimentary_teachers = floor($validated['stud'] / 20);
    
        // Calculate extra teachers (those that are chargeable)
        $extra_teachers = max(0, $validated['teacher'] - $complimentary_teachers);
    
        // Calculate total amount
        $amount = ($validated['stud'] * $rate) + ($extra_teachers * 400);
    
        // Calculate advance (30% of amount)
        $advance = round($amount * 0.3, 2);
    
        // Get discount (if provided, else 0)
        $discount = $validated['discount'] ?? 0;
    
        // Calculate net amount
        $netamount = max(0, $amount - $discount);
    
        // Store data in database and get the created booking instance
        $booking = SchoolBooking::create([
            'sname' => $validated['sname'],
            'addr' => $validated['addr'],
            'cn' => $validated['cn'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'stud' => $validated['stud'],
            'teacher' => $validated['teacher'],
            'rate' => $rate,
            'amount' => $amount,
            'advance' => $advance,
            'discount' => $discount,
            'netamount' => $netamount,
            'status' => 'Pending',
        ]);
        return redirect()->route('invoice.create', ['bookingId' => $booking->id, 'type' => 'school_booking']);

    }
    
    
}
