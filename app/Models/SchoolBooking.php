<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolBooking extends Model
{
    use HasFactory;

    protected $table = 'school_booking'; 
  
    protected $fillable = [
        'admin_id','sname', 'addr', 'cn', 'date', 'time', 'stud','teacher','rate','amount','advance','discount','netamount','Status', 
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
