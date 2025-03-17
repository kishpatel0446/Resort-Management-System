<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_date', 'vendor_name', 'net_amount'
    ];

    public function items()
    {
        return $this->hasMany(KitchenPurchaseItem::class);
    }
}

