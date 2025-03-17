<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolBooking;

class SchoolBookingController extends Controller
{
    public function showBookingForm()
    {
        return view('schoolbooking');  
    }

    public function store(Request $request){
        $validated = $request->validate([
            'sname' => 'required|string',
            'addr' => 'required|string',
            'cn' => 'required|string|max:10',
            'date' => 'required|date',
            'time' => 'required|string',
            'stud' => 'required|integer|min:0',
            'teacher' => 'required|integer|min:0',
            'advance'=>'nullable|numeric',
        ]);

        SchoolBooking::create([
            'sname' => $validated['sname'],
            'addr' => $validated['addr'],
            'cn' => $validated['cn'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'stud' => $validated['stud'],
            'teacher' => $validated['teacher'],
            'advance' => $validated['advance'],
        ]);

       
        session()->flash('success', 'Enjoy Your Day!!!');

        return redirect('/');
    }
}
