<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyIncome;
use App\Models\DailyExpense;
use App\Models\Investment;
use App\Models\KitchenPurchase;
use App\Models\Purchase;

class AdminDashboardController extends Controller
{
    public function index()
{
    // Fetch total income and total investments
    $totalIncome = DailyIncome::sum('amount');
    $totalInvestment = Investment::sum('amount');

    // Calculate total expenses (Daily Expenses + Kitchen Purchases + Other Purchases)
    $dailyExpenseTotal = DailyExpense::sum('amount');
    $kitchenExpenseTotal = KitchenPurchase::sum('net_amount');
    $otherExpenseTotal = Purchase::sum('net_amount');

    // Total expenses calculation
    $totalExpenses = $dailyExpenseTotal + $kitchenExpenseTotal + $otherExpenseTotal;

    // Calculate net profit (Income - Expenses)
    $netProfit = $totalIncome - $totalExpenses;

    return view('admin.dashboard', compact(
        'totalIncome', 'totalExpenses', 'totalInvestment', 'netProfit'
    ));
}


}
