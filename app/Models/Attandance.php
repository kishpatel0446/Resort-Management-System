<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Attandance extends Model
{

    use HasFactory;

    
    protected $fillable = ['staff_id', 'date', 'status', 'leave_time'];

    
    protected $dates = ['created_at', 'updated_at'];

    
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

}
