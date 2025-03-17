<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminBooking;
use App\Models\AgentBooking;
use App\Models\Booking;
use App\Models\SchoolBooking;
use Carbon\Carbon;

class ViewBookingController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $bookings = Booking::whereDate('date', '>=', $today)->orderBy('date', 'asc')->get();

        return view('admin.viewbookings', compact('bookings'));
    }

    public function school()
    {
        $today = Carbon::today();
        $schoolBookings = SchoolBooking::whereDate('date', '>=', $today)->orderBy('date', 'asc')->get();


        return view('admin.viewschool', compact('schoolBookings'));
    }
    public function admin()
    {

        $today = Carbon::today();
        $adminBookings = AdminBooking::whereDate('date', '>=', $today)
            ->with('admin')
            ->orderBy('date', 'asc')
            ->get();


        return view('admin.viewadmin', compact('adminBookings'));
    }
    public function agent()
    {
        $today = Carbon::today();
        $agentBookings = AgentBooking::whereDate('date', '>=', $today)->orderBy('date', 'asc')->get();

        return view('admin.viewagent', compact('agentBookings'));
    }
}
