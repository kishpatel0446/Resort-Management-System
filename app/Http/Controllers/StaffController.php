<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('joining_date', 'asc')->get();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.addstaff');
    }

    public function store(Request $request)
    {
        DB::enableQueryLog();

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'aadhar_no' => 'required|digits:12|unique:staff,aadhar_no',
        'contact_no' => 'required|digits:10',
        'salary' => 'required|numeric',
        'role' => 'required|string',
        'joining_date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
    ]);

    
    if ($request->hasFile('image')) {
       
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('staff_images', $imageName, 'public');
    } else {
        
        $imagePath = 'staff_images/default.jpg';  
    }

    $staff = Staff::create([
        'name' => $request->name,
        'address' => $request->address,
        'aadhar_no' => $request->aadhar_no,
        'contact_no' => $request->contact_no,
        'salary' => $request->salary,
        'role' => $request->role,
        'joining_date' => $request->joining_date,
        'image' => $imagePath,
    ]);

    Log::info('Query Log:', DB::getQueryLog());

    return redirect()->route('staff.index')->with('success', 'Staff added successfully!');

    }
    
    public function show($id)
{
    $staff = Staff::with('withdrawals')->find($id);
    if (!$staff) {
        return redirect()->route('staff.index')->with('error', 'Staff not found');
    }

    return view('staff.detail', compact('staff'));
}
public function remove($staffId)
    {
        $staff = Staff::find($staffId);
        if ($staff) {
            $staff->delete();
            return redirect()->route('staff.index')->with('success', 'Staff member removed successfully.');
        }
        return redirect()->route('staff.list')->with('error', 'Staff member not found.');
    }
}
