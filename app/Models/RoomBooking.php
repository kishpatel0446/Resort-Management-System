<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'customer_name',
        'customer_phone',
        'check_in',
        'check_out',
        'adults',
        'kids',
        'extra_bed',
        'price',
        'extra_bed_price',
        'total_price',
        'advance',
        'discount',
        'netamount',
        'status', 
        'booked_by',
        'checkout_date_time',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
