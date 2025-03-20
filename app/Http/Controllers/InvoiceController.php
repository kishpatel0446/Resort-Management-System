<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Booking;
use App\Models\SchoolBooking;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function createInvoice($bookingId, $type = 'booking')
{
    if ($type === 'booking') {
        $booking = Booking::findOrFail($bookingId);
        $rates = $this->getRatesByTimeSlot($booking->time);

        $total_kids = $booking->kids * ($rates['rate_adults'] * 0.7);
        $total_adults = $booking->adults * $rates['rate_adults'];
        $total_amount = $total_kids + $total_adults;
        $discount = 0;
        $net_amount = $total_amount - $discount;

        $bill = Bill::create([
            'customer_name' => $booking->name,
            'contact_no' => $booking->cn,
            'booking_date' => $booking->date,
            'time_slot' => $booking->time,
            'kids' => $booking->kids,
            'rate_kids' => $rates['rate_adults'] * 0.7,
            'total_kids' => $total_kids,
            'adults' => $booking->adults,
            'rate_adults' => $rates['rate_adults'],
            'total_adults' => $total_adults,
            'total_amount' => $total_amount,
            'discount' => $discount,
            'net_amount' => $net_amount,
            'booking_id' => $booking->id,
            'type' => 'booking',
        ]);
    } else if ($type === 'school_booking') {
        $booking = SchoolBooking::findOrFail($bookingId);
        $rate = $this->getRateForSchoolBooking($booking->time);
        
        $extra_teachers = max(0, $booking->teacher - floor($booking->stud / 20));
        $total_amount = ($booking->stud * $rate) + ($extra_teachers * 400);
        $discount = $booking->discount ?? 0;
        $advance = $total_amount * 0.3;
        $net_amount = $total_amount - $discount;
        
        $bill = Bill::create([
            'customer_name' => $booking->sname,
            'contact_no' => $booking->cn,
            'booking_date' => $booking->date,
            'time_slot' => $booking->time,
            'kids' => $booking->stud, // Students as kids
            'rate_kids' => $rate, // Student rate
            'total_kids' => $booking->stud * $rate, // Total for students
            'adults' => $booking->teacher, // Teachers as adults
            'rate_adults' => 400, // Fixed charge for extra teachers
            'total_adults' => $extra_teachers * 400, // Only extra teachers are charged
            'extra_teachers' => $extra_teachers, // Store extra teachers
            'total_amount' => $total_amount,
            'discount' => $discount,
            'net_amount' => $net_amount,
            'advance' => $advance,
            'booking_id' => $booking->id,
            'type' => 'school_booking',
        ]);
    } else {
        abort(404); // Invalid type
    }

    return redirect()->route('invoice.show', ['bill' => $bill->id]);
}


    private function getRatesByTimeSlot($timeSlot)
    {
        switch ($timeSlot) {
            case '09 to 09':
                return ['rate_adults' => 1500];
            case '09 to 05':
                return ['rate_adults' => 1200];
            case '11 to 09':
                return ['rate_adults' => 1350];
            case '04 to 09':
                return ['rate_adults' => 850];
            default:
                return ['rate_adults' => 0];
        }
    }

    private function getRateForSchoolBooking($timeSlot)
    {
        switch ($timeSlot) {
            case '9:30 to 05 (RS.675)':
                return 675;
            case '9:30 to 05 (RS.700)':
                return 700;
            case '9:30 to 09 (RS.900)':
                return 900;
            default:
                return 0;
        }
    }

    public function showInvoice($billId)
{
    $bill = Bill::findOrFail($billId);
    return view('bills.bill', compact('bill'));
}

}
