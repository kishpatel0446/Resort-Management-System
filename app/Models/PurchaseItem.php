<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id', 'item_name', 'rate', 'qty', 'total_amount'
    ];

    public function Purchase()
    {
        return $this->belongsTo(KitchenPurchase::class);
    }
}
