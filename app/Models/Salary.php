<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = ['staff_id', 'fixed_salary', 'payable_salary', 'withdrawal','balance_due', 'salary_date','status'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
