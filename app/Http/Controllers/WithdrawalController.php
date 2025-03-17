<?php


namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Models\Staff;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function create($staffId)
    {
        $staff = Staff::findOrFail($staffId);
        return view('withdrawal', compact('staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => 'required',
            'amount' => 'required|numeric',
            'withdrawal_date' => 'required|date',
        ]);

        // Store withdrawal record
        Withdrawal::create([
            'staff_id' => $request->staff_id,
            'amount' => $request->amount,
            'withdrawal_date' => $request->withdrawal_date,
        ]);

        return redirect()->route('salary.create', $request->staff_id)->with('success', 'Withdrawal added successfully');
    }
}

