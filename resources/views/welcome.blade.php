@extends('layouts.app')

@section('title', 'Contact Us - Ambik Riverside Camp & Resorts')

@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    h1,
    h2,
    h5 {
        font-weight: bold;
        color: #2c3e50;
    }

    .carousel-item {
        position: relative;
    }

    .slider-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }

    .carousel-caption {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }

    .carousel-caption p {
        font-size: 24px;
        font-weight: bold;
        color: white;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
    }

    .book-now-btn {
        background: rgba(255, 255, 255, 0.9);
        color: #007BFF;
        padding: 12px 24px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        text-transform: uppercase;
    }

    .book-now-btn:hover {
        background: #007BFF;
        color: white;
        transform: scale(1.1);
    }

    .welcome-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .welcome-section img {
        width: 100%;
        max-height: 350px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }


    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background: white;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-custom h5 {
        font-size: 20px;
        font-weight: bold;
        color: #007BFF;
    }

    .card-custom p {
        color: #555;
        font-size: 14px;
    }


    .gallery img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    .gallery img:hover {
        transform: scale(1.05);
    }


    .view-more-btn {
        display: block;
        margin: 30px auto;
        text-align: center;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 5px;
        background: linear-gradient(135deg, rgba(255, 0, 157, 0.87), rgba(63, 0, 38, 0.88));
        color: white;
        transition: 0.3s ease-in-out;
        text-decoration: none;
        width: fit-content;
    }

    .view-more-btn:hover {
        background: rgba(255, 0, 157, 0.87),
    }

    .package-card {
        background: linear-gradient(135deg, rgba(255, 0, 157, 0.87), rgba(63, 0, 38, 0.88));
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

    .section-subtitle {
        text-align: center;
        font-size: 18px;
        color: #666;
        font-style: italic;
        margin-bottom: 30px;
    }

    .package-card h5,
    .package-card p {
        color: white !important;
    }

    .section-title {
        text-align: center;
        font-size: 38px;
        font-weight: bold;
        color: rgb(129, 51, 255);
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
        margin-top: 30px;
    }
</style>


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        @php
        $sliderImages = ['amb.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '33.jpg'];
        @endphp

        @foreach ($sliderImages as $index => $image)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="slider-overlay"></div>
            <img src="{{ asset('img/' . $image) }}" class="d-block w-100" alt="Slider Image" style="max-height: 500px; object-fit: cover;">

            <div class="carousel-caption">
                <p>Welcome to Ambik Riverside Camp & Resort</p>
                <a href="{{ route('bookings') }}" class="btn book-now-btn">Book Now</a>
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<br>


<div style="display: flex; align-items: center; justify-content: space-between; background: linear-gradient(to right, #f4f4f4, #e3f2fd); padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">

    <div style="flex: 1; padding-right: 30px;">
        <h2 style="color: #2c3e50; font-size: 24px; font-weight: bold; margin-bottom: 15px;">Welcome to Ambik Riverside Camp & Resort</h2>
        <p style="color: #444; font-size: 16px; line-height: 1.6;">
            Escape into a world of adventure and thrill, surrounded by the lush greenery of picturesque mango orchards.
            <span style="color: #00796b; font-weight: bold; font-size: 18px;">AMBIK RIVERSIDE CAMP AND RESORT</span> is your ultimate destination for unforgettable moments filled with fun, excitement, and relaxation!
        </p>

        <p style="font-size: 15px; line-height: 1.5;">
            Conveniently located <span style="color: #d32f2f; font-weight: bold;">55 km from Surat</span> and
            <span style="color: #d32f2f; font-weight: bold;">13 km from Navsari</span>, at Kachholi, this is the ideal spot for families, friends, and large groups.
        </p>

        <p style="color: #555; font-size: 15px; font-style: italic;">
            "More the numbers, more the merriment!"
        </p>
        <p style="color: #00796b; font-size: 16px; font-weight: bold;">
            🌿 Experience the joy of nature, adventure, and learning like never before!
        </p>
    </div>

    <div style="flex: 1; text-align: center;">
        <img src="{{ asset('img/15.jpg') }}" alt="Ambik Riverside Camp"
            style="width: 100%; max-height: 350px; border-radius: 10px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); transition: transform 0.3s;">
    </div>
</div>
<br>


<div class="container mt-5">
    <h1 class="section-title">🏕️ Packages</h1>
    <p class="section-subtitle">A fun-filled experience with exciting activities and delicious food.</p>

    <div class="row mt-4">
        @foreach ($picnicPackages as $package)
        <div class="col-md-3 mb-4">
            <div class="package-card text-center">
                <h5>{{ $package->time }}</h5>
                <p>{{ $package->details }}</p>
                <br>
                <br>
                <a href="{{ route('bookings') }}" class="price-box">RS. {{ number_format($package->price, 2) }}</a>
            </div>
        </div>
        @endforeach
    </div>
    <a href="/perks" class="view-more-btn">View More In Packages</a>
</div>


<h1 class="section-title">✨ Explore Ambik Riverside Camp & Resorts 🏕️</h1>

<div class="container mt-5">
    <div class="row gallery">
        @foreach (['31.jpg', '19.jpg', '33.jpg', '34.jpg'] as $image)
        <div class="col-md-3">
            <img src="{{ asset('img/' . $image) }}" alt="Gallery Image">
        </div>
        @endforeach
    </div>

    <a href="/gallary" class="view-more-btn">Explore Us</a>
</div>

@endsection