<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentBooking;

class AgentBookingController extends Controller
{
    public function create()
        {
            return view('Admin.bookings.agentbooking');

        }
    
        
        public function store(Request $request)
{
    
    $validated = $request->validate([
        'agentname' => 'required|string|max:255',
        'cn' => 'required|string|max:15',
        'acn' => 'nullable|string|max:15',
        'date' => 'required|date',
        'time' => 'required|string|max:50',
        'adults' => 'required|integer',
        'adults_rate' => 'required|numeric',
        'kids' => 'required|integer',
        'kids_rate' => 'nullable|numeric',
        'amount' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'netamount' => 'required|numeric',
        'advance'=>'nullable|numeric',
    ]);

    $booking = new AgentBooking;
    $booking->admin_id = auth('admin')->id();
    $booking->agentname = $validated['agentname'];
    $booking->cn = $validated['cn'];
    $booking->acn = $validated['acn'];
    $booking->date = $validated['date'];
    $booking->time = $validated['time'];
    $booking->adults = $validated['adults'];
    $booking->adults_rate = $validated['adults_rate'];
    $booking->kids = $validated['kids'];
    $booking->kids_rate = $validated['kids_rate'];
    $booking->amount = $validated['amount'];
    $booking->discount = $validated['discount'];
    $booking->netamount = $validated['netamount'];
    $booking->advance = $validated['advance'];
    $booking->save();

   
    return redirect()->route('agent.booking.create')->with('success', 'Booking created successfully');
}

}
