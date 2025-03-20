@extends('layouts.app')

@section('title', 'School Booking - Ambik Riverside Camp & Resorts')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, rgb(35, 59, 212), rgb(1, 29, 89)); /* Blue Gradient */
        font-family: Arial, sans-serif;
    }
    
    .booking-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 30px;
        background: rgba(255, 255, 255, 0.95); /* Slight Transparency */
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
    }

    .booking-container h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #0056b3;
        font-weight: bold;
    }

    .booking-container form {
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
    .form-group select {
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: border-color 0.3s, box-shadow 0.3s;
        background-color: #f0f8ff;
    }

    .form-group input:focus,
    .form-group select:focus {
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
    input::placeholder {
        font-size: 14px;
        color: #888;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .booking-container {
            padding: 20px;
        }

        .booking-container form {
            grid-template-columns: 1fr;
        }

        .submit-btn {
            grid-column: span 1;
        }
    }
</style>

<div class="booking-container">
    <h1>School Booking Form</h1>
    <form method="POST" action="{{ route('submit.schoolbooking') }}">
        @csrf
        <div class="form-group">
            <label for="sname">🏫 School Name</label>
            <input type="text" id="sname" name="sname" placeholder="Enter School Name" required>
        </div>

        <div class="form-group">
            <label for="addr">📍 School Address</label>
            <input type="text" id="addr" name="addr" placeholder="Enter School Address" required>
        </div>

        <div class="form-group">
            <label for="cn">📱 Mobile No (Co-ordinator)</label>
            <input type="text" id="cn" name="cn" placeholder="Enter Mobile Number" required>
        </div>

        <div class="form-group">
            <label for="date">📅 Booking Date</label>
            <input type="date" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="time">⏰ Time Slot</label>
            <select name="time" id="time" required>
                <option value="">Select Time</option>
                <option value="9:30 to 05 (RS.675)" data-rate="675">9:30 to 05 (RS.675)</option>
                <option value="9:30 to 05 (RS.700)" data-rate="700">9:30 to 05 (RS.700)</option>
                <option value="9:30 to 09 (RS.900)" data-rate="900">9:30 to 09 (RS.900)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="stud">🧑‍🎓 Number of Students</label>
            <input type="number" id="stud" name="stud" placeholder="Enter Number of Students" min="0" required>
        </div>

        <div class="form-group">
            <label for="teacher">👨‍🏫 Number of Teachers</label>
            <input type="number" id="teacher" name="teacher" placeholder="Enter Number of Teachers" min="0" required>
        </div>

        <button type="submit" class="submit-btn">
            <i class="fas fa-check-circle"></i> Confirm Booking
        </button>
    </form>

    <div class="alert">
        <h5>📌 Important Notes</h5>
        <ul>
    <li>✅ You have to make 30% Payment in Advance for confirm booking</li>
    <li>🎓 1 teacher complimentary for every 20 students.</li>
    <li>👨‍🏫 Extra Teacher Charge: ₹400/- per teacher</li>
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
