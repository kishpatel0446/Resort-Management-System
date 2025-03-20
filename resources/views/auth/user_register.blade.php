@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" 
     style="min-height: 100vh; background: linear-gradient(135deg, #004e92, #000428); padding: 50px;"> 
    
    <div class="card p-5 shadow-lg rounded" 
         style="width: 450px; background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
        
        <div class="text-center">
            <img src="{{ asset('img/37.png') }}" alt="Register" width="90">
        </div>
        
        <h2 class="text-center text-success mt-3 fw-bold">User Registration</h2>

        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '❌ Oops!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#dc3545'
                });
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.register') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">🧑 Full Name</label>
                <input type="text" id="name" name="name" class="form-control rounded-pill" 
                       value="{{ old('name') }}" required placeholder="Enter your name">
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label fw-bold">📱 Mobile Number</label>
                <input type="text" id="mobile" name="mobile" class="form-control rounded-pill" 
                       value="{{ old('mobile') }}" maxlength="10" required placeholder="Enter mobile number">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">📧 Email Address</label>
                <input type="email" id="email" name="email" class="form-control rounded-pill" 
                       value="{{ old('email') }}" required placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label fw-bold">🏠 Address</label>
                <textarea id="address" name="address" class="form-control rounded" required 
                          placeholder="Enter your address">{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">🔑 Password</label>
                <input type="password" id="password" name="password" class="form-control rounded-pill" 
                       required placeholder="Enter password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-bold">🔒 Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" 
                       class="form-control rounded-pill" required placeholder="Confirm password">
            </div>

            <button type="submit" class="btn btn-success w-100 fw-bold rounded-pill">
                ✅ Register Now
            </button>
        </form>

        <p class="text-center mt-3">
            Already have an account? 
            <a href="{{ route('user.login') }}" class="text-decoration-none fw-bold">Login</a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        padding-top: 70px;
    }

    .main-content {
        flex: 1;
    }

    .card {
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .card:hover {
        transform: scale(1.03);
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
    }

    input::placeholder, textarea::placeholder {
        font-size: 0.9rem;
        color: #aaa;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #1e7e34;
    }

    h2 {
        font-weight: 800;
    }

    .footer {
        background: #222;
        color: #fff;
        text-align: center;
        padding: 15px 0;
        width: 100%;
    }
</style>

@endsection
