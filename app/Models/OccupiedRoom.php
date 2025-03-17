<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OccupiedRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'customer_name',
        'customer_phone',
        'check_in',
        'check_out',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
