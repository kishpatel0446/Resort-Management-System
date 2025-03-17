<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\AdminBooking;
use App\Models\Booking;
use App\Models\AgentBooking;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::all();
        return view('bills.index', compact('bills'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:15',
            'booking_date' => 'required|date',
            'time_slot' => 'required|string|max:50',
            'kids' => 'required|integer|min:0',
            'rate_kids' => 'required|numeric|min:0',
            'adults' => 'required|integer|min:0',
            'rate_adults' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric',
        ]);
        $validatedData['discount'] = $validatedData['discount'] ?? 0;
        
        $total_kids = $request->kids * $request->rate_kids;
        $total_adults = $request->adults * $request->rate_adults;
        $total_amount = $total_kids + $total_adults;
        $net_amount = $total_amount - ($request->discount ?? 0);

        $bill = Bill::create(array_merge($request->all(), [
            'total_kids' => $total_kids,
            'total_adults' => $total_adults,
            'total_amount' => $total_amount,
            'net_amount' => $net_amount,
        ]));

        return redirect()->route('bills.show', $bill->id)->with('success', 'Bill created successfully.');
    }

    public function create()
    {
        return view('generatebill', [
            'websiteBooking' => null,
            'adminBooking' => null,
            'agentBooking' => null,
        ]);
    }
    
    public function show(Bill $bill)
    {
        return view('bills.show', compact('bill'));
    }

    public function generateBillFromWebsite($id)
    {
        $websiteBooking = Booking::findOrFail($id);

        return view('generatebill', compact('websiteBooking'));
    }

    public function generateBillFromAdmin($id)
    {
        $adminBooking = AdminBooking::findOrFail($id);

        return view('generatebill', compact('adminBooking'));
    }

    public function generateBillFromAgent($id)
    {
        $agentBooking = AgentBooking::findOrFail($id);

        return view('generatebill', compact('agentBooking'));
    }
}
