@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" 
     style="background: linear-gradient(135deg,rgb(35, 59, 212),rgb(1, 29, 89));"> 
    
    <div class="card p-4 shadow-lg rounded" 
         style="width: 380px; background: rgba(255, 255, 255, 0.95); border-radius: 15px;">
        
        <div class="text-center">
            <img src="{{ asset('img/37.png') }}" alt="Login" width="80">
        </div>
        
        <h2 class="text-center text-primary mt-2 fw-bold">User Login</h2>

        @if(session('register'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: '🎊 Welcome Aboard!',
            text: "{{ session('register') }}",
            confirmButtonText: 'OK',
            timer: 5000
        });
    </script>
@endif

@if(session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'warning',
            title: '🔐 Login Required!',
            text: "{{ session('error') }}",
            confirmButtonText: 'OK',
            timer: 5000
        });
    </script>
@endif



        <form action="{{ route('user.login') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="mobile" class="form-label fw-bold">📱 Mobile Number</label>
                <input type="text" id="mobile" name="mobile" class="form-control rounded-pill"
                       maxlength="10" required placeholder="Enter mobile number">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">🔑 Password</label>
                <input type="password" id="password" name="password" class="form-control rounded-pill"
                       required placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold rounded-pill">
                🚀 Login
            </button>
        </form>

        <p class="text-center mt-3">
            Don't have an account? 
            <a href="{{ route('user.registerform') }}" class="text-decoration-none fw-bold">Register</a>
        </p>
    </div>
</div>

<style>
    .card {
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .card:hover {
        transform: scale(1.03);
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
    }

    input::placeholder {
        font-size: 0.9rem;
        color: #aaa;
    }

    .btn-primary {
        background-color: #004e92;
        border: none;
    }

    .btn-primary:hover {
        background-color: #002c58;
    }

    h2 {
        font-weight: 800;
    }
</style>
@endsection
