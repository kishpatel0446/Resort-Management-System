<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentBooking extends Model
{
    use HasFactory;

    // protected $table = 'admin_bookings';
    protected $table = 'agent_booking'; 
  
    protected $fillable = [
        'admin_id',
        'agentname',
        'cn',
        'acn',
        'date',
        'time',
        'kids',
        'adults',
        'kids_rate',  
        'adults_rate',
        'amount',  
        'advance',   
        'discount',    
        'netamount',  
        'Status', 
    ];
 
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');  
    }   
}
