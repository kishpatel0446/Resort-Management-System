<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseItem;

class PurchaseController extends Controller
{
    public function create()
    {
        return view('purchases.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'purchase_date' => 'required|date',
            'vendor_name' => 'required|string',
            'items' => 'required|array',
            'items.*.item_name' => 'required|string',
            'items.*.rate' => 'required|numeric',
            'items.*.qty' => 'required|integer',
        ]);


        $purchase = Purchase::create([
            'purchase_date' => $request->purchase_date,
            'vendor_name' => $request->vendor_name,
            'net_amount' => 0,
        ]);

        $totalAmount = 0;


        foreach ($request->items as $item) {
            $totalAmount += $item['rate'] * $item['qty'];

            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'item_name' => $item['item_name'],
                'rate' => $item['rate'],
                'qty' => $item['qty'],
                'total_amount' => $item['rate'] * $item['qty'],
            ]);
        }

        $purchase->update(['net_amount' => $totalAmount]);

        return redirect()->route('purchases.index')->with('success', 'Kitchen purchase recorded successfully!');
    }

    public function index()
    {
        $purchases = Purchase::with('items')
            ->orderBy('purchase_date', 'asc')
            ->get();
        return view('purchases.index', compact('purchases'));
    }



    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);

        return view('purchases.show', compact('purchase'));
    }
}
