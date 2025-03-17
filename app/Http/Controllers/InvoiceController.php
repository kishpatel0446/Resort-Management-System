<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function createInvoice($bookingId)
    {
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
        ]);

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

    public function showInvoice($billId)
    {
        $bill = Bill::findOrFail($billId);

        return view('bills.bill', compact('bill'));
    }
}
