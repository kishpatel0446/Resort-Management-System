<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    
    protected $fillable = [
        'name', 'address', 'aadhar_no', 'contact_no', 'salary', 'role', 'joining_date', 'image'
    ];

    
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
    public function attendances()
{
    return $this->hasMany(Attandance::class);
}
}

