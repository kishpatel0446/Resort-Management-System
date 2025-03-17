@extends('layouts.app')

@section('title', 'Packages - Ambik Riverside Camp & Resorts')

@section('content')

<style>
    .hero-section {
        position: relative;
        text-align: center;
        height: 500px;
        overflow: hidden;
    }

    .hero-section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: blur(8px);
    }

    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }

    .hero-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: 'Georgia', serif;
        font-size: 60px;
        font-weight: bold;
        letter-spacing: 2px;
        color: white;
        text-shadow: 4px 4px 10px rgba(0, 0, 0, 1);
    }


    .section-title {
        font-size: 32px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        color: rgb(23, 37, 181);
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        letter-spacing: 1.5px;
    }

    .section-subtitle {
        text-align: center;
        font-size: 18px;
        color: #666;
        font-style: italic;
        margin-bottom: 30px;
    }

    .package-card {
        background: linear-gradient(135deg, rgb(255, 0, 0), rgb(63, 21, 0));
        color: white;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
        padding: 20px;
    }

    .package-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .package-card h5 {
        font-size: 22px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .package-card p {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .price-box {
    display: inline-block;
    background: linear-gradient(135deg, #FFD700, #FF8C00);
    color: black;
    padding: 10px 15px;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s ease-in-out;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.price-box:hover {
    background: linear-gradient(135deg, #FFC107, #FF4500);
    color: white;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}


    .image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .package-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .package-image:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .text-shadow {
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        padding: 10px;
    }

    .book-btn {
        display: block;
        margin: 30px auto;
        text-align: center;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 5px;
        background: linear-gradient(135deg, rgb(255, 0, 0), rgb(63, 21, 0));
        color: white;
        transition: 0.3s ease-in-out;
        text-decoration: none;
        width: fit-content;
    }
</style>

<div class="hero-section">
    <img src="{{ asset('img/amb.jpg') }}" alt="Gallery Background">
    <div class="hero-overlay"></div>
    <div class="hero-text">🏕️ PACKAGES</div>
</div>

<div class="container mt-5">
    <h1 class="section-title">🌅 Day Picnic Packages</h1>
    <p class="section-subtitle">A fun-filled experience with exciting activities and delicious food.</p>

    <div class="row mt-4" style="color: wheat;">
        @foreach ($picnicPackages as $package)
        <div class="col-md-3 mb-4">
            <div class="package-card text-center">
                <h5>{{ $package->time }}</h5>
                <p>{{ $package->details }}</p>
                <br>
                <br>
                <a href="{{ route('bookings') }}" class="price-box">Rs. {{ number_format($package->price, 2) }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5">
    <h1 class="section-title">🌙 Overnight Stay Packages</h1>
    <p class="section-subtitle">Enjoy a peaceful night with premium accommodation and facilities.</p>
    <div class="row image-gallery">
        @foreach (['38', '39', '40', 'r1', 'r2', 'r3', '38', '39'] as $img)
        <div class="col-md-3 mb-3">
            <div class="image-container">
                <img src="{{ asset("img/$img.jpg") }}" class="img-fluid package-image">
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-3">
        @foreach ($roomPrices as $room)
        <p class="text-success text-shadow" style="font-size: 20px;">🏕️ Tents: <span class="text-danger">Rs. {{ number_format($room->price, 2) }}/-</span> (Two persons)</p>
        @endforeach
        <a href="{{ route('roombooking') }}" class="book-btn">Book Now</a>
    </div>
</div>

<div class="card mt-4 text-center" style="border: 2px solid #007BFF; border-radius: 10px; background: linear-gradient(to right, #001f3f, #007BFF); color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <div class="card-body">
        <h5 class="card-title text-white" style="font-weight: bold; text-transform: uppercase;">🎯 Activities Included</h5>
        <div class="row mt-4 text-start">
            @foreach([
            ['Plank Bridge', 'Burma Bridge', 'Swinging Planks', 'Commando Net Walk', 'Parallel Bars'],
            ['Space Walk', 'Burma Loop', 'Rain Shower', 'Burma Bridge', 'Swimming Pool']
            ] as $activities)
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    @foreach($activities as $activity)
                    <li class="list-group-item bg-transparent text-white border-0">
                        <i class="fas fa-check-circle text-warning"></i> {{ $activity }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card mt-4 text-center" style="border: 2px solid #D61D1D; border-radius: 10px; background: linear-gradient(to right, #3f0000, #D61D1D); color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <div class="card-body">
        <h5 class="card-title text-white" style="font-weight: bold; text-transform: uppercase;">🔔 Important Notes:</h5>
        <ul class="list-unstyled mt-3 text-white text-start">
            <li>🕰️ Timings are fixed; late arrivals may result in missing activities.</li>
            <li>🚫 Outside food & drinks are not allowed.</li>
            <li>👕 Dress appropriately for adventure activities.</li>
            <li>💳 Advance booking is mandatory.</li>
            <li>⚠️ Management reserves the right to modify packages.</li>
        </ul>
    </div>
</div>
<p class="text-center text-shadow mt-3">✨ Thank you for choosing "Ambik Riverside Camp and Resort"! ✨</p>
@endsection