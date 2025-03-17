<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyExpense;

use Illuminate\Support\Facades\DB;

class DailyExpenseController extends Controller
{
    public function index()
    {
        $expenses = DailyExpense::select('id', 'date', 'category', 'amount', 'note')
            ->latest()
            ->get();

        $kitchenPurchases = DB::table('kitchen_purchases')
            ->select('id', 'purchase_date', 'vendor_name as category', 'net_amount as amount', DB::raw("'Kitchen' as note"))
            ->get();

        $otherPurchases = DB::table('purchases')
            ->select('id', 'purchase_date', 'vendor_name as category', 'net_amount as amount', DB::raw("'Other Purchase' as note"))
            ->get();

        return view('account.expense.index', compact('expenses', 'kitchenPurchases', 'otherPurchases'));
    }


    public function create()
    {
        return view('account.expense.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        DailyExpense::create($request->all());

        return redirect()->route('daily-expenses.index')->with('success', 'Expense added successfully!');
    }

    public function edit(DailyExpense $dailyExpense)
    {
        return view('account.expense.edit', compact('dailyExpense'));
    }

    public function update(Request $request, DailyExpense $dailyExpense)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $dailyExpense->update($request->all());

        return redirect()->route('daily-expenses.index')->with('success', 'Expense updated successfully!');
    }

    public function destroy(DailyExpense $dailyExpense)
    {
        $dailyExpense->delete();
        return redirect()->route('daily-expenses.index')->with('success', 'Expense deleted successfully!');
    }
}
