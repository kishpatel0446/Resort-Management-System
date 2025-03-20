<?php

namespace App\Http\Controllers;

use App\Models\DailyIncome;
use App\Models\DailyExpense;
use App\Models\Investment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SchoolBooking;
use App\Models\Booking;
use App\Models\AdminBooking;
use App\Models\AgentBooking;


class ReportsController extends Controller
{
    public function schoolPicnic()
    {
        $school = SchoolBooking::orderBy('date', 'asc')->get();
        return view('reports.school_picnic', compact('school'));
    }

    public function filterSchoolPicnic(Request $request)
    {
        $query = SchoolBooking::query();

        if ($request->school_name) {
            $query->where('sname', 'like', '%' . $request->school_name . '%');
        }

        if ($request->date) {
            $query->whereDate('date', '=', $request->date);
        }

        if ($request->address) {
            $query->where('addr', 'like', '%' . $request->address . '%');
        }

        if ($request->time_slot) {
            $query->where('time', 'like', '%' . $request->time_slot);
        }


        $school = $query->get();

        return response()->json([
            'data' => view('reports.partials.school_picnic_table_data', compact('school'))->render(),
        ]);
    }


    public function dailyBooking(Request $request)
{
    $queryDate = $request->input('date');
    $queryTime = $request->input('time');

    $adminBooking = AdminBooking::query();
    $schoolBooking = SchoolBooking::query();
    $agentBooking = AgentBooking::query();
    $onlineBooking = Booking::query();

    // Apply date filter if provided
    if (!empty($queryDate)) {
        $adminBooking->whereDate('date', $queryDate);
        $schoolBooking->whereDate('date', $queryDate);
        $agentBooking->whereDate('date', $queryDate);
        $onlineBooking->whereDate('date', $queryDate);
    }

    // Apply exact time match filter if provided
    if (!empty($queryTime)) {
        $adminBooking->where('time', $queryTime);
        $schoolBooking->where('time', $queryTime);
        $agentBooking->where('time', $queryTime);
        $onlineBooking->where('time', $queryTime);
    }

    return view('reports.daily_booking', [
        'adminBooking' => $adminBooking->orderBy('date', 'asc')->get(),
        'schoolBooking' => $schoolBooking->orderBy('date', 'asc')->get(),
        'agentBooking' => $agentBooking->orderBy('date', 'asc')->get(),
        'onlineBooking' => $onlineBooking->orderBy('date', 'asc')->get(),
        'selectedDate' => $queryDate,
        'selectedTime' => $queryTime
    ]);
}


    public function adminBooking(Request $request)
    {
        $query = AdminBooking::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('adults')) {
            $query->where('adults', $request->adults);
        }

        if ($request->filled('kids')) {
            $query->where('kids', $request->kids);
        }

        if ($request->filled('contact')) {
            $query->where('cn', 'like', '%' . $request->contact . '%');
        }

        $adminBookings = $query->orderBy('date', 'asc')->get();

        if ($request->ajax()) {
            return view('reports.partials.bookings_table', compact('adminBookings'));
        }

        return view('reports.admin_booking', compact('adminBookings'));
    }


    public function websiteBooking(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('adults')) {
            $query->where('adults', $request->adults);
        }
        if ($request->filled('kids')) {
            $query->where('kids', $request->kids);
        }
        if ($request->filled('contact')) {
            $query->where('cn', 'like', '%' . $request->contact . '%');
        }

        $websiteBookings = $query->orderBy('date', 'asc')->get();

        if ($request->ajax()) {
            return view('reports.partials.website_booking_table', compact('websiteBookings'));
        }

        return view('reports.website_booking', compact('websiteBookings'));
    }
    public function agentBooking(Request $request)
    {
        $query = AgentBooking::query();

        if ($request->has('date') && $request->date) {
            $query->whereDate('date', $request->date);
        }

        if ($request->has('name') && $request->name) {
            $query->where('agentname', 'like', '%' . $request->name . '%');
        }

        if ($request->has('adults') && $request->adults) {
            $query->where('adults', $request->adults);
        }

        if ($request->has('kids') && $request->kids) {
            $query->where('kids', $request->kids);
        }

        if ($request->has('contact') && $request->contact) {
            $query->where('cn', 'like', '%' . $request->contact . '%');
        }

        $agentBookings = $query->orderBy('date', 'desc')->get();

        if ($request->ajax()) {
            return response()->json([
                'table_html' => view('reports.partials.agent_booking_table', compact('agentBookings'))->render(),
            ]);
        }

        return view('reports.agent_booking', compact('agentBookings'));
    }




    public function staffReport()
    {
        return view('reports.staff_report');
    }

    public function accountReport(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth());

        $incomeData = DailyIncome::whereBetween('date', [$startDate, $endDate])->get();
        $expenseData = DailyExpense::whereBetween('date', [$startDate, $endDate])->get();
        $investmentData = Investment::whereBetween('date', [$startDate, $endDate])->get();

        $totalIncome = $incomeData->sum('amount');
        $totalExpenses = $expenseData->sum('amount');
        $totalInvestments = $investmentData->sum('amount');
        $netProfit = $totalIncome - ($totalExpenses + $totalInvestments);

        return view('reports.account_report', compact(
            'incomeData',
            'expenseData',
            'investmentData',
            'totalIncome',
            'totalExpenses',
            'totalInvestments',
            'netProfit',
            'startDate',
            'endDate'
        ));
    }

    public function incomeReport(Request $request)
    {
        $query = DailyIncome::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }
        if ($request->filled('source')) {
            $query->where('source', 'LIKE', "%{$request->source}%");
        }
        if ($request->filled('note')) {
            $query->where('note', 'LIKE', "%{$request->note}%");
        }
        if ($request->filled('min_amount')) {
            $query->where('amount', '>=', $request->min_amount);
        }
        if ($request->filled('max_amount')) {
            $query->where('amount', '<=', $request->max_amount);
        }

        $incomeData = $query->get();
        $totalIncome = $incomeData->sum('amount');

        if ($request->ajax()) {
            return view('reports.partials.income_table', compact('incomeData', 'totalIncome'))->render();
        }

        return view('reports.income_report', compact('incomeData', 'totalIncome'));
    }


    public function expenseReport()
    {
        $dailyExpenses = DailyExpense::all();
        $kitchenPurchases = DB::table('kitchen_purchases')
            ->select('id', 'purchase_date as date', 'vendor_name as category', 'net_amount as amount', DB::raw("'Kitchen Purchase' as note"))
            ->get();
        $otherPurchases = DB::table('purchases')
            ->select('id', 'purchase_date as date', 'vendor_name as category', 'net_amount as amount', DB::raw("'Other Purchase' as note"))
            ->get();

        $expenseCategories = DailyExpense::select('category')->distinct()->pluck('category')->toArray();
        $kitchenCategories = DB::table('kitchen_purchases')->select('vendor_name as category')->distinct()->pluck('category')->toArray();
        $otherCategories = DB::table('purchases')->select('vendor_name as category')->distinct()->pluck('category')->toArray();

        $categories = array_unique(array_merge($expenseCategories, $kitchenCategories, $otherCategories));

        $totalExpenses = $dailyExpenses->sum('amount') + $kitchenPurchases->sum('amount') + $otherPurchases->sum('amount');

        return view('reports.expense_report', compact('dailyExpenses', 'kitchenPurchases', 'otherPurchases', 'totalExpenses', 'categories'));
    }

    public function filterExpenseReport(Request $request)
    {
        $query = DB::table('daily_expenses')
            ->select('id', 'date', 'amount', 'category', 'note', 'created_at', 'updated_at');

        $kitchenQuery = DB::table('kitchen_purchases')
            ->select('id', 'purchase_date as date', 'vendor_name as category', 'net_amount as amount', 'created_at', 'updated_at', DB::raw("'Kitchen Purchase' as note"));

        $otherQuery = DB::table('purchases')
            ->select('id', 'purchase_date as date', 'vendor_name as category', 'net_amount as amount', 'created_at', 'updated_at', DB::raw("'Other Purchase' as note"));

        if ($request->start_date && $request->end_date) {
            $start_date = \Carbon\Carbon::parse($request->start_date)->startOfDay();
            $end_date = \Carbon\Carbon::parse($request->end_date)->endOfDay();

            $query->whereBetween('date', [$start_date, $end_date]);
            $kitchenQuery->whereBetween('purchase_date', [$start_date, $end_date]);
            $otherQuery->whereBetween('purchase_date', [$start_date, $end_date]);
        }

        if ($request->category) {
            $query->where('category', $request->category);
            $kitchenQuery->where('vendor_name', $request->category);
            $otherQuery->where('vendor_name', $request->category);
        }

        if ($request->min_amount && $request->max_amount) {
            $query->whereBetween('amount', [$request->min_amount, $request->max_amount]);
            $kitchenQuery->whereBetween('net_amount', [$request->min_amount, $request->max_amount]);
            $otherQuery->whereBetween('net_amount', [$request->min_amount, $request->max_amount]);
        }

        $dailyExpenses = $query->get();
        $kitchenPurchases = $kitchenQuery->get();
        $otherPurchases = $otherQuery->get();

        $totalExpenses = $dailyExpenses->sum('amount') + $kitchenPurchases->sum('amount') + $otherPurchases->sum('amount');

        return response()->json([
            'data' => view('reports.partials.expense_data', compact('dailyExpenses', 'kitchenPurchases', 'otherPurchases'))->render(),
            'total' => number_format($totalExpenses, 2)
        ]);
    }
    public function investmentReport(Request $request)
    {
        $investorName = $request->input('investor_name', '');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Investment::query();

        if (!empty($investorName)) {
            $query->where('investor_name', 'LIKE', "%$investorName%");
        }

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $investmentData = $query->get();
        $totalInvestments = $investmentData->sum('amount');

        return view('reports.investment_report', compact(
            'investmentData',
            'totalInvestments',
            'startDate',
            'endDate'
        ));
    }

    public function filterInvestmentReport(Request $request)
    {
        $query = Investment::query();

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        if ($request->filled('investor_name')) {
            $query->where('investor_name', 'LIKE', "%{$request->investor_name}%");
        }

        if ($request->filled('amount')) {
            $query->where('amount', $request->amount);
        }

        $investmentData = $query->get();
        $totalInvestments = $investmentData->sum('amount');

        $html = view('reports.partials.investment_table', compact('investmentData'))->render();

        return response()->json([
            'html' => $html,
            'totalInvestments' => $totalInvestments
        ]);
    }

    public function dailyReport()
    {
        $today = date('Y-m-d');


        $onlineBookings = DB::table('bookings')->where('date', $today)->get(['id', 'name', 'cn', 'time', 'kids', 'adults', 'amount', 'discount', 'netamount', 'advance', 'status']);
        $offlineBookings = DB::table('admin_bookings')->where('date', $today)->get(['id', 'name', 'cn', 'time', 'kids', 'adults', 'amount', 'discount', 'netamount', 'advance', 'status']);
        $agentBookings = DB::table('agent_booking')->where('date', $today)->get(['id', 'agentname as name', 'cn', 'time', 'kids', 'adults', 'amount', 'discount', 'netamount', 'advance', 'status']);
        $schoolBookings = DB::table('school_booking')->where('date', $today)->get(['id', 'sname as name', 'cn', 'time', 'stud as kids', 'teacher as adults', 'amount', 'discount', 'netamount', 'advance', 'status']);

        return view('reports.daily_report', compact('onlineBookings', 'offlineBookings', 'agentBookings', 'schoolBookings'));
    }



    public function checkIn($table, $id)
    {

        $allowedTables = ['bookings', 'admin_bookings', 'agent_booking', 'school_booking'];

        if (!in_array($table, $allowedTables)) {
            return response()->json(['success' => false, 'message' => 'Invalid table'], 400);
        }

        $updated = DB::table($table)
            ->where('id', $id)
            ->update(['Status' => 'Checked In']);

        if ($updated) {
            return response()->json(['success' => true, 'message' => 'Checked In successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update']);
        }
    }
    public function purchaseReports()
    {
        $items = DB::table('kitchen_purchase_items')
            ->select(
                'item_name as name',
                DB::raw('SUM(qty) as total_quantity'),
                DB::raw('SUM(total_amount) as total_cost')
            )
            ->groupBy('item_name')
            ->union(
                DB::table('purchase_items')
                    ->select(
                        'item_name as name',
                        DB::raw('SUM(qty) as total_quantity'),
                        DB::raw('SUM(total_amount) as total_cost')
                    )
                    ->groupBy('item_name')
            )
            ->get();

        $vendors = DB::table('purchases')
            ->select(
                'vendor_name as name',
                DB::raw('COUNT(id) as total_purchases'),
                DB::raw('SUM(net_amount) as total_amount')
            )
            ->groupBy('vendor_name')
            ->union(
                DB::table('kitchen_purchases')
                    ->select(
                        'vendor_name as name',
                        DB::raw('COUNT(id) as total_purchases'),
                        DB::raw('SUM(net_amount) as total_amount')
                    )
                    ->groupBy('vendor_name')
            )
            ->get();


        $purchases = DB::table('purchases')
            ->selectRaw('DATE(created_at) as purchase_date, COUNT(id) as total_purchases, SUM(net_amount) as total_amount')
            ->groupByRaw('DATE(created_at)')
            ->union(
                DB::table('kitchen_purchases')
                    ->selectRaw('DATE(created_at) as purchase_date, COUNT(id) as total_purchases, SUM(net_amount) as total_amount')
                    ->groupByRaw('DATE(created_at)')
            )
            ->union(
                DB::table('purchase_items')
                    ->selectRaw('DATE(created_at) as purchase_date, COUNT(id) as total_purchases, SUM(total_amount) as total_amount')
                    ->groupByRaw('DATE(created_at)')
            )
            ->union(
                DB::table('kitchen_purchase_items')
                    ->selectRaw('DATE(created_at) as purchase_date, COUNT(id) as total_purchases, SUM(total_amount) as total_amount')
                    ->groupByRaw('DATE(created_at)')
            )
            ->get();

        return view('reports.purchase_reports', compact('items', 'vendors', 'purchases'));
    }

    public function vendorPurchases($vendor_name)
    {
        // Fetch purchases from `purchases` table
        $purchases = DB::table('purchases')
            ->where('vendor_name', $vendor_name)
            ->select('id', 'created_at', 'net_amount')
            ->get();

        // Fetch kitchen purchases from `kitchen_purchases` table
        $kitchen_purchases = DB::table('kitchen_purchases')
            ->where('vendor_name', $vendor_name)
            ->select('id', 'created_at', 'net_amount')
            ->get();

        // Fetch purchase items related to purchases
        $purchase_items = DB::table('purchase_items')
            ->whereIn('purchase_id', $purchases->pluck('id'))
            ->select('purchase_id', 'item_name', 'rate', 'qty', 'total_amount')
            ->get()
            ->groupBy('purchase_id');

        // Fetch kitchen purchase items related to kitchen purchases
        $kitchen_purchase_items = DB::table('kitchen_purchase_items')
            ->whereIn('kitchen_purchase_id', $kitchen_purchases->pluck('id'))
            ->select('kitchen_purchase_id', 'item_name', 'rate', 'qty', 'total_amount')
            ->get()
            ->groupBy('kitchen_purchase_id');

        return view('reports.vendor_purchases', compact(
            'purchases',
            'kitchen_purchases',
            'vendor_name',
            'purchase_items',
            'kitchen_purchase_items'
        ));
    }

    public function getPurchaseItems(Request $request)
    {
        $date = $request->input('date');

        // Fetch kitchen purchases
        $kitchenPurchases = DB::table('kitchen_purchases')
            ->whereDate('created_at', $date)
            ->get();

        $totalKitchenPurchases = 0;
        $totalKitchenAmount = 0;

        foreach ($kitchenPurchases as $purchase) {
            $purchase->items = DB::table('kitchen_purchase_items')
                ->where('kitchen_purchase_id', $purchase->id)
                ->get();

            // Sum up kitchen purchase counts and amounts
            $totalKitchenPurchases += $purchase->items->count();
            $totalKitchenAmount += $purchase->items->sum('total_amount');
        }

        // Fetch regular purchases
        $purchases = DB::table('purchases')
            ->whereDate('created_at', $date)
            ->get();

        $totalPurchases = 0;
        $totalAmount = 0;

        foreach ($purchases as $purchase) {
            $purchase->items = DB::table('purchase_items')
                ->where('purchase_id', $purchase->id)
                ->get();

            // Sum up regular purchase counts and amounts
            $totalPurchases += $purchase->items->count();
            $totalAmount += $purchase->items->sum('total_amount');
        }


        $grandTotalPurchases = $totalPurchases + $totalKitchenPurchases;
        $grandTotalAmount = $totalAmount + $totalKitchenAmount;

        return view('reports.partials.purchase_items', compact(
            'purchases',
            'kitchenPurchases',
            'grandTotalPurchases',
            'grandTotalAmount'
        ))->render();
    }
}
