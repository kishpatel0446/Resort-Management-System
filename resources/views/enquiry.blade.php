@extends('layouts.app')

@section('title', 'Contact Us - Ambik Riverside Camp & Resorts')

@section('content')
<style>
    .contact-section {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        padding: 50px 0;
        border-radius: 10px;
    }

    .contact-container {
        max-width: 500px;
        margin: auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        text-align: center;
        font-family: 'Poppins', sans-serif;
    }

    .contact-container h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #0072ff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .contact-container p {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }

    .contact-container form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        text-align: left;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 2px solid #ddd;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #0072ff;
        box-shadow: 0 0 8px rgba(0, 114, 255, 0.3);
        outline: none;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        background: linear-gradient(45deg, #0072ff, #00c6ff);
        color: white;
        padding: 12px 20px;
        font-size: 18px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .submit-btn:hover {
        background: linear-gradient(45deg, #00c6ff, #0072ff);
        transform: scale(1.05);
    }
</style>

<div class="contact-section">
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>Have a question or inquiry?
        <p>Feel Free To Ask. Fill out the form below, and we'll get back to you soon!</p>
        <form method="POST" action="{{ route('submit.enquiry') }}">
            @csrf
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Your Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="mo"><i class="fas fa-phone"></i> Mobile No</label>
                <input type="text" id="mo" name="mo" placeholder="Enter your mobile number" required>
            </div>
            <div class="form-group">
                <label for="message"><i class="fas fa-comment-dots"></i> Message</label>
                <textarea id="message" name="message" placeholder="Write your message" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
</div>
<br>
@endsection