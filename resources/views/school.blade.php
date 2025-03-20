@extends('layouts.app')

@section('title', 'School Picnic - Ambik Riverside Camp & Resorts')

@section('content')
<style>
    .card {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        border: none;
        border-radius: 12px;
        margin-bottom: 20px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        border-radius: 25px;
        padding: 0.6rem 1.8rem;
        font-weight: bold;
        transition: background 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: #0056b3;
        transform: scale(1.05);
    }

    h5 {
        font-weight: bold;
    }

    .highlight {
        color: #ffcc00;
        font-weight: bold;
    }

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


    .package-card {
        background: linear-gradient(to right, rgb(73, 15, 117), rgb(50, 70, 184));
        color: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        transition: 0.3s ease-in-out;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
    }

    .package-card:hover {
        transform: scale(1.05);
    }

    .package-card h5 {
        font-size: 24px;
        font-weight: bold;
        color: #ffcc00;
    }

    .package-card p {
        font-size: 16px;
    }

    .package-btn {
        background: #ffcc00;
        color: black;
        font-weight: bold;
        border-radius: 25px;
        padding: 10px 20px;
        transition: 0.3s ease-in-out;
    }

    .package-btn:hover {
        background: #e6b800;
        transform: scale(1.05);
    }

    .meals-section {
        border: 2px solid #E67E22;
        border-radius: 10px;
        background: linear-gradient(to right, #8E44AD, #E67E22);
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .text-shadow {
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        padding: 10px;
    }
</style>

<div class="hero-section">
    <img src="{{ asset('img/amb.jpg') }}" alt="Gallery Background">
    <div class="hero-overlay"></div>
    <div class="hero-text">🌳 School Picnic</div>
</div>

<div class="container mt-5">
    <div class="row">
        @foreach([
        ['title' => 'Package-1', 'price' => '675', 'checkin' => '9:30 AM', 'checkout' => '5:00 PM', 'extras' => 'Breakfast, Lunch, Entry, Adventure Activities, Nature Education'],
        ['title' => 'Package-2', 'price' => '700', 'checkin' => '9:30 AM', 'checkout' => '5:00 PM', 'extras' => 'Breakfast, Lunch, Evening Snacks, Entry, Adventure Activities, Nature Education'],
        ['title' => 'Package-3', 'price' => '900', 'checkin' => '9:30 AM', 'checkout' => '9:00 PM', 'extras' => 'Breakfast, Lunch, Evening Snacks, Dinner, Entry, Adventure Activities, Nature Education']
        ] as $package)
        <div class="col-md-4">
            <div class="package-card">
                <h5>{{ $package['title'] }}</h5>
                <p><strong>Check-in:</strong> {{ $package['checkin'] }} | <strong>Check-out:</strong> {{ $package['checkout'] }}</p>
                <p class="highlight">Per Child: Rs. {{ $package['price'] }}/-</p>
                <p><strong>Includes:</strong> {{ $package['extras'] }}</p>
                <a href="{{ route('schoolbooking') }}" class="btn package-btn">Book Now</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="card mt-4 text-center" style="border: 2px solid #007BFF; background: linear-gradient(to right, #001f3f, #007BFF); color: white;">
    <div class="card-body">
        <h5 class="card-title">🎯 Activities Included</h5>
        <div class="row mt-4 text-start">
            @foreach([['Plank Bridge', 'Burma Bridge', 'Swinging Planks', 'Commando Net Walk', 'Parallel Bars'], ['Space Walk', 'Burma Loop', 'Rain Shower', 'Burma Bridge', 'Swimming Pool']] as $activities)
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    @foreach($activities as $activity)
                    <li class="list-group-item bg-transparent text-white border-0"><i class="fas fa-check-circle text-warning"></i> {{ $activity }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card mt-4 text-center meals-section">
    <div class="card-body">
        <h5 class="card-title">🍴 Meals Included</h5>
        <ul class="list-unstyled mt-3 text-white text-start">
            <li><i class="fas fa-utensils text-warning"></i> <strong>Breakfast:</strong> One Hot Snack, Tea/Coffee for Teachers</li>
            <li><i class="fas fa-utensils text-warning"></i> <strong>Lunch:</strong> One Veg, One Kathole, Dal/Kadhi, Rice/Pulav, Fryums, Pickle, Sweet (Limited), Salad, Puri</li>
            <li><i class="fas fa-utensils text-warning"></i> <strong>Evening Snacks:</strong> One Hot Snack</li>
            <li><i class="fas fa-utensils text-warning"></i> <strong>Dinner:</strong> Pav Bhaji, Pulav</li>
        </ul>
    </div>
</div>

<div class="card mt-4 text-center" style="border: 2px solid #D61D1D; background: linear-gradient(to right, #3f0000, #D61D1D); color: white;">
    <div class="card-body">
        <h5 class="card-title">⚠️ Important Notes</h5>
        <ul class="list-unstyled mt-3 text-white text-start">
            <li>🎓 1 teacher complimentary for every 20 students.</li>
            <li>👨‍🏫 Extra Teacher Charge: ₹400/- per teacher</li>
            <li>📅 Not available on weekends and holidays.</li>
            <li>🍽️ Menu subject to change.</li>
            <li>📝 Advance booking required.</li>
            <li>❌ No refund policy.</li>
        </ul>
    </div>
</div>


<p class="text-center text-shadow mt-3">✨ Thank you for choosing "Ambik Riverside Camp and Resort"! ✨</p>
@endsection