<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Withdrawal;
use App\Models\Staff;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function showStaffList()
    {
        $staff = Staff::all();
        return view('staff-list', compact('staff'));
    }

    public function create($staffId)
    {
        $staff = Staff::findOrFail($staffId);
        $withdrawals = Withdrawal::where('staff_id', $staffId)->get();
        $totalWithdrawn = $withdrawals->sum('amount');

        $fixedSalary = $staff->salary;

        $lastSalary = Salary::where('staff_id', $staffId)
            ->orderBy('salary_date', 'desc')
            ->first();
        
        $previousBalance = $lastSalary ? $lastSalary->balance_due : 0; 
        $payableSalary = max(0, $fixedSalary - $totalWithdrawn - $previousBalance); 

        $alreadyPaid = Salary::where('staff_id', $staffId)
            ->whereMonth('salary_date', now()->month)
            ->whereYear('salary_date', now()->year)
            ->where('status', 'Paid')
            ->exists();

        return view('pay-salary', compact('staff', 'fixedSalary', 'payableSalary', 'withdrawals', 'alreadyPaid', 'previousBalance'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'fixed_salary' => 'required|numeric',
            'salary_date' => 'required|date',
            'withdrawal' => 'required|numeric|min:0',
        ]);

        $staff = Staff::findOrFail($request->staff_id);
        $salaryDate = $request->salary_date;
        $withdrawalAmount = $request->withdrawal;

        $existingSalary = Salary::where('staff_id', $staff->id)
            ->whereMonth('salary_date', date('m', strtotime($salaryDate)))
            ->whereYear('salary_date', date('Y', strtotime($salaryDate)))
            ->where('status', 'Paid')
            ->first();

        if ($existingSalary) {
            return redirect()->back()->with('error', 'Salary for this month has already been paid!');
        }

        $lastSalary = Salary::where('staff_id', $staff->id)
            ->orderBy('salary_date', 'desc')
            ->first();
        
        $previousBalance = $lastSalary ? $lastSalary->balance_due : 0;

        $fixedSalary = $staff->salary;
        $effectiveSalary = max(0, $fixedSalary - $previousBalance);

        if ($withdrawalAmount > $effectiveSalary) {
            $balanceDue = $withdrawalAmount - $effectiveSalary;
        } else {
            $balanceDue = 0;
        }

        Salary::create([
            'staff_id' => $staff->id,
            'fixed_salary' => $fixedSalary,
            'payable_salary' => $effectiveSalary,
            'withdrawal' => $withdrawalAmount,
            'balance_due' => $balanceDue,
            'salary_date' => $salaryDate,
            'status' => 'Paid',
        ]);

        return redirect()->route('salary.view', ['staffId' => $staff->id])
                         ->with('success', 'Salary paid successfully!');
    }

    public function view($staffId)
    {
        $staff = Staff::findOrFail($staffId);
        $salaries = Salary::where('staff_id', $staffId)->get();
        $withdrawals = Withdrawal::where('staff_id', $staffId)->get();

        return view('view-salary', compact('staff', 'salaries', 'withdrawals'));
    }
}
