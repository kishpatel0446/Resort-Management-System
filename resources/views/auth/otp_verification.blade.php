@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100"
    style="background: linear-gradient(135deg,rgb(35, 59, 212),rgb(1, 29, 89));">

    <div class="card p-4 shadow-lg rounded"
        style="width: 380px; background: rgba(255, 255, 255, 0.95); border-radius: 15px;">

        <div class="text-center">
            <img src="{{ asset('img/37.png') }}" alt="OTP" width="80">
        </div>

        <h2 class="text-center text-primary mt-2 fw-bold">OTP Verification</h2>

        @if(session('message'))
        <div class="alert alert-info text-center">
            {{ session('message') }}
        </div>
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

        <form action="{{ session()->has('register_data') ? route('user.verifyRegisterOtp') : route('user.verifyLoginOtp') }}" method="POST">

            @csrf
            <div class="mb-3">
                <label for="otp" class="form-label fw-bold">📩 Enter OTP</label>
                <input type="text" id="otp" name="otp" class="form-control rounded-pill"
                    required placeholder="Enter OTP received on mobile">
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold rounded-pill">
                ✅ Verify OTP
            </button>
        </form>
    </div>
</div>

<script>
    Swal.fire({
        icon: 'info',
        title: '🔢 Your OTP',
        text: "{{ $otp }}",
        confirmButtonText: 'OK'
    });
</script>

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