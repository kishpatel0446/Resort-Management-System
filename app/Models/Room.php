<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'capacity',
        'price_per_night',
        'is_available',
        'maintenance',
    ];

    public function roomBookings(): HasMany
    {
        return $this->hasMany(RoomBooking::class, 'room_id');
    }

    public function onlineBookings(): BelongsToMany
    {
        return $this->belongsToMany(OnlineBooking::class, 'booking_room', 'room_id', 'online_booking_id')
            ->withTimestamps();
    }

    public function isAvailableForDateRange($checkIn, $checkOut)
    {
        $offlineBookingExists = $this->roomBookings()
            ->where('status', '!=', 'Checked out')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        $onlineBookingExists = $this->onlineBookings()
            ->where('status', '!=', 'Checked out')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                    });
            })
            ->exists();

        return !$offlineBookingExists && !$onlineBookingExists;
    }
}
