<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::latest()->get();
        return view('account.investments.index', compact('investments'));
    }

    public function create()
    {
        return view('account.investments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'investor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        Investment::create($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment added successfully!');
    }

    public function edit(Investment $investment)
    {
        return view('account.investments.edit', compact('investment'));
    }

    public function update(Request $request, Investment $investment)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'investor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $investment->update($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment updated successfully!');
    }

    public function destroy(Investment $investment)
    {
        $investment->delete();
        return redirect()->route('investments.index')->with('success', 'Investment deleted successfully!');
    }
}
