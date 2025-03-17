<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register'); 
    }

    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|confirmed',]);

        if ($validator->fails()) {
            return redirect()->route('admin.register')
                ->withErrors($validator)
                ->withInput();
        }

        
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->guard('admin')->login($admin);
        return redirect()->route('admin.login');
    }
}
