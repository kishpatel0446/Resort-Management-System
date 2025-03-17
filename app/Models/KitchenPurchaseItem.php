<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenPurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'kitchen_purchase_id', 'item_name', 'rate', 'qty', 'total_amount'
    ];

    public function kitchenPurchase()
    {
        return $this->belongsTo(KitchenPurchase::class);
    }
}

