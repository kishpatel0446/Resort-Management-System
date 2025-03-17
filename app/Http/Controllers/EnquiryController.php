<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function showEnquiryForm()
    {
        return view('enquiry');  
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mo' => 'required|string|max:10',
            'message' => 'required|string|max:1000',
        ]);

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'mobileno' => $validated['mo'],
            'message' => $validated['message'],
        ]);

        session()->flash('enquired', 'Our Team Will Contact You Soon!!!');
        return redirect('/');
    }

    public function index()
    {
        $inquiries = Enquiry::all();
        return view('inquiries.index', compact('inquiries'));
    }
    public function markHandled($id)
{
    $inquiry = Enquiry::findOrFail($id);
    $inquiry->handled = true;
    $inquiry->save();

    return redirect()->route('inquiries.index')->with('success', 'Inquiry marked as handled.');
}

}
