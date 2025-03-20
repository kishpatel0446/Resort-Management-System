<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'contact_no',
        'booking_date',
        'time_slot',
        'kids',
        'extra_teachers',
        'rate_kids',
        'total_kids',
        'adults',
        'rate_adults',
        'total_adults',
        'total_amount',
        'discount',
        'net_amount',
        'type',
    ];
}
