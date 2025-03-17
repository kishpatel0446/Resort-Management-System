<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OnlineBooking extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'num_rooms',
        'status', 
    ];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'booking_room', 'online_booking_id', 'room_id')
                    ->withTimestamps();
    }
    
}
