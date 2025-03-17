<?php

namespace App\Http\Controllers;

use App\Models\KitchenPurchase;
use App\Models\KitchenPurchaseItem;
use Illuminate\Http\Request;

class KitchenPurchaseController extends Controller
{
    public function create()
    {
        return view('kitchen_purchases.create');
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


        $kitchenPurchase = KitchenPurchase::create([
            'purchase_date' => $request->purchase_date,
            'vendor_name' => $request->vendor_name,
            'net_amount' => 0,
        ]);

        $totalAmount = 0;


        foreach ($request->items as $item) {
            $totalAmount += $item['rate'] * $item['qty'];

            KitchenPurchaseItem::create([
                'kitchen_purchase_id' => $kitchenPurchase->id,
                'item_name' => $item['item_name'],
                'rate' => $item['rate'],
                'qty' => $item['qty'],
                'total_amount' => $item['rate'] * $item['qty'],
            ]);
        }

        $kitchenPurchase->update(['net_amount' => $totalAmount]);

        return redirect()->route('kitchen_purchases.index')->with('success', 'Kitchen purchase recorded successfully!');
    }

    public function index()
    {
        $kitchenPurchases = KitchenPurchase::with('items')
            ->orderBy('purchase_date', 'asc')
            ->get();
        return view('kitchen_purchases.index', compact('kitchenPurchases'));
    }



    public function show($id)
    {
        $kitchenPurchase = KitchenPurchase::findOrFail($id);

        return view('kitchen_purchases.show', compact('kitchenPurchase'));
    }
}
