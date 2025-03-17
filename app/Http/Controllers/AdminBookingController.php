<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminBooking;
use App\Models\SchoolBooking;
use Illuminate\Http\Request;

   
    class AdminBookingController extends Controller
    {
        
        public function create()
        {
            return view('admin.bookings.adminbooking');

        }
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'cn' => 'required|string|max:15',
                'date' => 'required|date',
                'time' => 'required|string|max:50',
                'kids' => 'required|integer',
                'adults' => 'required|integer',
                'adults_rate' => 'required|numeric',
                'kids_rate' => 'nullable|numeric',
                'amount' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'netamount' => 'required|numeric',
                'advance'=>'nullable|numeric',
            ]);
    
            
            AdminBooking::create([
                'admin_id' => auth('admin')->id(), 
                'name' => $request->name,
                'cn' => $request->cn,
                'date' => $request->date,
                'time' => $request->time,
                'kids' => $request->kids,
                'adults' => $request->adults,
                'kids_rate'=>$request->kids_rate,
                'adults_rate'=>$request->adults_rate,
                'amount'=>$request->amount,
                'discount'=>$request->discount,
                'netamount'=>$request->netamount,
                'advance'=>$request->advance,

            ]);
    
            return redirect()->route('admin.bookings.create')->with('success', 'Booking added successfully!');
        }


        public function schoolcreate()
        {
            return view('admin.bookings.schoolbooking');

        }


        public function schoolstore(Request $request)
        {
            $validated = $request->validate([
                'sname' => 'required|string',
                'addr' => 'required|string',
                'cn' => 'required|string|max:10',
                'date' => 'required|date',
                'time' => 'required|string',
                'stud' => 'required|integer|min:0',
                'teacher' => 'required|integer|min:0',
                'rate' => 'nullable|numeric',
                'amount' => 'required|numeric',
                'discount' => 'nullable|numeric',
                'netamount' => 'required|numeric',
                'advance'=>'nullable|numeric',
            ]);
    
            
            SchoolBooking::create([
            'admin_id' => auth('admin')->id(), 
            'sname' => $validated['sname'],
            'addr' => $validated['addr'],
            'cn' => $validated['cn'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'stud' => $validated['stud'],
            'teacher' => $validated['teacher'],
            'rate' => $validated['rate'],
            'amount' => $validated['amount'],
            'discount' => $validated['discount'],
            'netamount' => $validated['netamount'],
            'advance'=>  $validated['advance'],

            ]);
    
            return redirect()->route('admin.bookings.create')->with('success', 'Booking added successfully!');
        }
    }
    

