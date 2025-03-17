<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Show the admin profile page.
     *  
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return a view with the user details (You can pass more data if needed)
        return view('admin.profile', compact('user'));
    }
}
