<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user_login');
    }

    public function showRegisterForm()
    {
        return view('auth.user_register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10|unique:customers,mobile',
            'email' => 'required|email|max:255|unique:customers,email',
            'address' => 'required|string|max:500',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $otp = rand(100000, 999999);
        session(['otp' => $otp, 'register_data' => $request->all()]);

        return view('auth.otp_verification')->with([
            'otp' => $otp,
            'message' => 'OTP sent to your mobile number.'
        ]);
    }

    public function verifyRegisterOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        if (!session()->has('otp')) {
            return back()->withErrors(['otp' => 'Session expired. Please register again.']);
        }

        $storedOtp = (string) session('otp');
        $enteredOtp = (string) $request->otp;

        if ($storedOtp === $enteredOtp) {
            $data = session('register_data');

            if (!$data) {
                return back()->withErrors(['otp' => 'Session expired. Please register again.']);
            }

            $customer = Customer::create([
                'name' => $data['name'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'address' => $data['address'],
                'password' => bcrypt($data['password']),
            ]);

            session()->forget(['otp', 'register_data']);

            return redirect()->route('user.login')->with('register', 'Registration successful! Please log in.');
        }

        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }




    public function login(Request $request)
    {
        $request->validate(['mobile' => 'required|digits:10']);

        $customer = Customer::where('mobile', $request->mobile)->first();

        if (!$customer) {
            return back()->withErrors(['login_error' => 'Mobile number not registered.']);
        }

        $otp = rand(100000, 999999);
        session(['otp' => $otp, 'login_mobile' => $request->mobile]);

        return view('auth.otp_verification')->with([
            'otp' => $otp,
            'message' => 'OTP sent to your mobile number.'
        ]);
    }

    public function verifyLoginOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);

        if (session('otp') == $request->otp) {
            $customer = Customer::where('mobile', session('login_mobile'))->first();

            if ($customer) {
                session(['user' => [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'mobile' => $customer->mobile,
                    'email' => $customer->email
                ]]);

                session()->forget(['otp', 'login_mobile']);

                return redirect('/')->with('login', 'Login successful!');
            }
        }

        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }

    public function logout()
    {
        session()->forget('user');
        session()->flush();

        return redirect('/')->with('logout', 'Logged out successfully.');
    }
}
