<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // protected $table = 'bookings'; 

    // protected $fillable = [
    //     'name',
    //     'cn',
    //     'acn',
    //     'date',
    //     'time',
    //     'kids',
    //     'adults',
    // ];
    protected $fillable = [
        'name', 'cn', 'acn', 'date', 'time', 'kids', 'adults',
        'kids_rate', 'adults_rate', 'amount','advance', 'discount', 'netamount','Status',
    ];
    // public $timestamps = false;
}
