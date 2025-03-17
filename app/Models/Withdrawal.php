<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = ['staff_id', 'amount', 'withdrawal_date'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
