@extends('layouts.app')

@section('title', 'Contact Us - Ambik Riverside Camp & Resorts')

@section('content')
<style>
    body {
        background: linear-gradient(135deg,rgb(35, 59, 212),rgb(1, 29, 89)); /* Sky Blue Gradient */
        font-family: Arial, sans-serif;
    }
    
    .contact-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.95); /* Slight Transparency */
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
    }

    .contact-container h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #0056b3;
        font-weight: bold;
    }

    .contact-container form {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #0056b3;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: border-color 0.3s, box-shadow 0.3s;
        background-color: #f0f8ff;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .submit-btn {
        grid-column: span 2;
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: #fff;
        padding: 14px;
        font-size: 18px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s, background 0.3s;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .submit-btn i {
        font-size: 20px;
    }

    .submit-btn:hover {
        background: linear-gradient(135deg, #0056b3, #003f7f);
        transform: scale(1.05);
    }

    .alert {
        grid-column: span 2;
        margin-top: 30px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-left: 5px solid #007bff;
        font-size: 16px;
        border-radius: 8px;
    }

    .alert h5 {
        font-size: 20px;
        font-weight: bold;
        color: #007bff;
        text-align: center;
    }

    .alert ul {
        padding-left: 20px;
        margin-top: 10px;
        color: #333;
    }

    /* Placeholder Styling */
    input::placeholder, textarea::placeholder {
        font-size: 14px;
        color: #888;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-container {
            padding: 20px;
        }

        .contact-container form {
            grid-template-columns: 1fr;
        }

        .submit-btn {
            grid-column: span 1;
        }
    }
</style>

<div class="contact-container">
    <h1>Welcome to Ambik Riverside Camp & Resort</h1>
    <form method="POST" action="{{ route('submit.booking') }}">
        @csrf
        <div class="form-group">
            <label for="name">👤 Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
            <label for="mo">📱 Mobile No (WhatsApp)</label>
            <input type="text" id="mo" name="mo" placeholder="Enter Your Mobile No" required>
        </div>

        <div class="form-group">
            <label for="amo">📞 Alternative Mobile No</label>
            <input type="text" id="amo" name="amo" placeholder="Enter Alternative Mobile No" required>
        </div>

        <div class="form-group">
            <label for="date">📅 Date</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="time">⏰ Time Slot</label>
            <select name="time" id="time" required>
                <option value="">Select Time</option>
                <option value="09 to 09" data-rate="1500">09:00 AM - 09:00 PM (RS. 1500)</option>
                <option value="09 to 05" data-rate="1200">09:00 AM - 05:00 PM (RS. 1200)</option>
                <option value="11 to 09" data-rate="1350">11:00 AM - 09:00 PM (RS. 1350)</option>
                <option value="04 to 09" data-rate="850">04:00 PM - 09:00 PM (RS. 850)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kids">🧒 Kids (5 to 10 Years)</label>
            <input type="number" id="kids" name="kids" placeholder="How Many KIDS..." min="0" required>
        </div>

        <div class="form-group">
            <label for="adl">👨‍🦰 Adults (Above 10 Years)</label>
            <input type="number" id="adl" name="adl" placeholder="How Many ADULTS..." min="0" required>
        </div>

        <button type="submit" class="submit-btn">
            <i class="fas fa-check-circle"></i> Confirm Booking
        </button>
    </form>

    <div class="alert alert-info mt-4" role="alert">
        <h5 class="alert-heading">📌 Important Notes</h5>
        <ul>
            <li>✅ You have to make 30% Payment in Advance for confirm booking</li>
            <li>🔄 Change in persons can be accepted</li>
            <li>💰 Taxes will be applicable extra on all the mentioned rates.</li>
            <li>🚫 No refund policy.</li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const timeSelect = document.getElementById('time');
    const rateLabel = document.createElement('label');
    const rateContainer = document.createElement('div');

    rateLabel.textContent = '💲 Rate for Selected Time Slot: ';
    rateContainer.id = 'rate-container';
    rateContainer.style.fontWeight = 'bold';

    rateLabel.appendChild(rateContainer);
    const form = document.querySelector('form');
    form.insertBefore(rateLabel, timeSelect.nextSibling);

    timeSelect.addEventListener('change', function() {
        const selectedOption = timeSelect.options[timeSelect.selectedIndex];
        const rate = selectedOption.getAttribute('data-rate');
        if (rate) {
            rateContainer.textContent = 'RS. ' + rate;
        } else {
            rateContainer.textContent = '';
        }
    });
});
</script>

@endsection
