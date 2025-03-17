<?php

namespace App\Http\Controllers;

use App\Models\Attandance;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $staff = Staff::with('attendances')->get();
        return view('attendance.index', compact('staff'));
    }

    public function view()
    {
        $attendances = Attandance::with('staff')->orderBy('date', 'desc')->get();
        return view('attendance-list', compact('attendances'));
    }
    
    public function store(Request $request)
{
    $validated = $request->validate([
        'attendance.*.staff_id' => 'required|exists:staff,id',
        'attendance.*.status' => 'required|in:Present,Absent,Leave',
    ]);

    $today = Carbon::now()->format('Y-m-d');

    $alreadyMarked = false; // Flag to track if attendance was updated

    foreach ($request->attendance as $attendanceData) {
        // Check if attendance already exists for this staff member today
        $existingAttendance = Attandance::where('staff_id', $attendanceData['staff_id'])
            ->whereDate('date', $today)
            ->first();

        if ($existingAttendance) {
            
            $existingAttendance->update([
                'status' => $attendanceData['status'],
                'leave_time' => $attendanceData['status'] == 'Leave' ? $attendanceData['leave_time'] : null, // Store leave time only if Leave
            ]);

            $alreadyMarked = true; 
        } else {
            
            Attandance::create([
                'staff_id' => $attendanceData['staff_id'],
                'date' => $today,
                'status' => $attendanceData['status'],
                'leave_time' => $attendanceData['status'] == 'Leave' ? $attendanceData['leave_time'] : null, // Store leave time only if Leave
            ]);
        }
    }

    // Redirect with success message
    if ($alreadyMarked) {
        return redirect()->route('attendance.view')->with('updated', 'Attendance updated successfully!');
    }

    return redirect()->route('attendance.view')->with('success', 'Attendance marked successfully!');
}

}
