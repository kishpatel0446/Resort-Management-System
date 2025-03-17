<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyIncome;

class DailyIncomeController extends Controller
{
    public function index()
    {
        $incomes = DailyIncome::latest()->get();
        return view('account.income.index', compact('incomes'));
    }

    public function create()
    {
        return view('account.income.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'source' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        DailyIncome::create($request->all());

        return redirect()->route('daily-income.index')->with('success', 'Income added successfully!');
    }

    public function edit(DailyIncome $dailyIncome)
    {
        return view('account.income.edit', compact('dailyIncome'));
    }

    public function update(Request $request, DailyIncome $dailyIncome)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'source' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $dailyIncome->update($request->all());

        return redirect()->route('daily-income.index')->with('success', 'Income updated successfully!');
    }

    public function destroy(DailyIncome $dailyIncome)
    {
        $dailyIncome->delete();
        return redirect()->route('daily-income.index')->with('success', 'Income deleted successfully!');
    }
}
