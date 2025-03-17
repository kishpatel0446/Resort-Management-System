@extends('layouts.app')

@section('title', 'Gallery - Ambik Riverside Camp & Resorts')

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

    .gallery-title {
        text-align: center;
        font-size: 38px;
        font-weight: bold;
        color: rgb(10, 22, 190);
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
        margin-top: 30px;
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        padding: 20px;
    }

    .gallery-card {
        width: 200px;
        height: 200px;
        cursor: pointer;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease-in-out;
        position: relative;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-card:hover {
        transform: scale(1.07);
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }



    #modal-image {
        max-width: 90%;
        max-height: 85vh;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
    }

    .modal-controls {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
    }

    .modal-button {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        font-size: 30px;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 5px;
        user-select: none;
        transition: background 0.3s;
    }

    .modal-button:hover {
        background: rgba(255, 255, 255, 0.5);
        color: black;
    }

    .close-button {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(to right, #001f3f, #007BFF);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 5px;
        user-select: none;
        z-index: 10000;
    }


    .close-button:hover {
        background: linear-gradient(to right,rgb(250, 2, 2), #001f3f);
    }
</style>

<div class="hero-section">
    <img src="{{ asset('img/amb.jpg') }}" alt="Gallery Background">
    <div class="hero-overlay"></div>
    <div class="hero-text">🖼️ GALLERY</div>
</div>

<h1 class="gallery-title">✨ Explore Ambik Riverside Camp & Resorts 🏕️</h1>

<div class="gallery">
    @foreach ($images as $image)
        <div class="gallery-card">
            <img src="{{ asset('uploads/gallery/' . $image->image) }}" alt="Gallery Image">
        </div>
    @endforeach
</div>

<div class="modal" id="image-modal">
    <button class="close-button" id="close-btn">✖</button>
    <div class="modal-controls">
        <button class="modal-button" id="prev-btn">❮</button>
        <button class="modal-button" id="next-btn">❯</button>
    </div>
    <img id="modal-image" src="" alt="Modal Image">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const closeBtn = document.getElementById('close-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const galleryCards = document.querySelectorAll('.gallery-card img');
    const images = Array.from(galleryCards).map(img => img.getAttribute('src'));
    let currentIndex = 0;

    galleryCards.forEach((img, index) => {
        img.addEventListener('click', () => {
            currentIndex = index;
            showImage();
            modal.style.display = 'flex';
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        showImage();
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage();
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    document.addEventListener('keydown', (e) => {
        if (modal.style.display === 'flex') {
            if (e.key === 'ArrowRight') nextBtn.click();
            if (e.key === 'ArrowLeft') prevBtn.click();
            if (e.key === 'Escape') closeBtn.click();
        }
    });

    function showImage() {
        modalImage.src = images[currentIndex];
    }
});

</script>

@endsection