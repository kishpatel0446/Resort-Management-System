@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book Room</h2>

    <form action="{{ route('book-room.review') }}" method="POST" id="bookingForm">
        @csrf

        <div class="form-group row">
            <div class="col-md-6">
                <label for="customer_name">Your Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="customer_phone">Phone Number</label>
                <input type="text" name="customer_phone" class="form-control" required>
            </div>
        </div>

        <div class="form-group row mt-3">
            <div class="col-md-6">
                <label for="check_in">Check-in Date</label>
                <input type="date" name="check_in" id="check_in" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="check_out">Check-out Date</label>
                <input type="date" name="check_out" id="check_out" class="form-control" required>
            </div>
        </div>

        <div class="form-group row mt-3">
            <div class="col-md-6">
                <label for="adults">Adults</label>
                <input type="number" name="adults" class="form-control" min="1" required>
            </div>
            <div class="col-md-6">
                <label for="kids">Kids</label>
                <input type="number" name="kids" class="form-control" min="0" required>
            </div>
        </div>

        <div class="form-group row mt-3">
            <div class="col-md-6">
                <label for="num_rooms">Number of Rooms</label>
                <input type="number" name="num_rooms" class="form-control" value="1" min="1" required>
            </div>
            <div class="col-md-6">
                <label for="extra_bed_check">Need Extra Bed?</label>
                <input type="checkbox" name="extra_bed_check" id="extra_bed_check">
                <input type="number" name="extra_bed" id="extra_bed" class="form-control mt-2" min="0" value="0" style="display: none;" placeholder="Number of Extra Beds">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Confirm Booking</button>
    </form>
</div>

<br>

<div class="alert mt-4" role="alert" style="background-color: #1A1A1A; border-left: 5px solid #D61D1D; border-radius: 10px; box-shadow: 0 4px 8px #1A1A1A; padding: 20px;">
    <h5 class="alert-heading text-center" style="font-weight: bold; color: #D61D1D; text-transform: uppercase;">⚠️ Important Notes</h5>
    <ul style="list-style-type: none; padding-left: 0; margin-top: 15px;">
        <li style="margin-bottom: 10px; background-color: #D61D1D; padding: 10px; border-radius: 5px; color: #FFF; font-weight: bold;">
            <i class="fas fa-rocket text-white"></i> We Have also rooms for 14 & 20 People. So if you want 1 room for 14 & 20 people then please select 1 room only.
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> Meals include lunch, high tea, dinner, and next day's breakfast.
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> Check-in at 12 noon & check-out at 11 AM the next day morning.
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> If You Want to Change in Check-in & Check-out time please
            <a class="btn btn-primary text-white" href="tel:+9824999968" role="button" style="white-space: nowrap;">Tell us in advance on 9824999968</a>
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> Additional person sharing the same room:
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> Child below 5 years: Complimentary.
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> 5 to 10 years: 70%.
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> Above 10 years: Full Charge.
        </li>
        <li style="margin-bottom: 10px; color: #F5F5F5; font-weight: 500;">
            <i class="fas fa-exclamation-circle text-danger"></i> No refund policy.
        </li>
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkInInput = document.getElementById("check_in");
        const checkOutInput = document.getElementById("check_out");

        function validateDates() {
            const checkInDate = new Date(checkInInput.value);
            const checkOutDate = new Date(checkOutInput.value);

            if (isNaN(checkInDate) || isNaN(checkOutDate)) return;

            if (checkOutDate.getTime() === checkInDate.getTime()) {
                alert("Please enter valid dates. Check-in and check-out dates cannot be the same.");
                checkOutInput.value = "";
                return false;
            }

            if (checkOutDate < checkInDate) {
                alert("Check-out date cannot be before check-in date.");
                checkOutInput.value = "";
                return false;
            }

            return true;
        }

        checkInInput.addEventListener("change", function() {
            if (checkOutInput.value) validateDates();
        });

        checkOutInput.addEventListener("change", validateDates);

        document.getElementById("bookingForm").addEventListener("submit", function(event) {
            if (!validateDates()) {
                event.preventDefault();
            }
        });

        document.getElementById("extra_bed_check").addEventListener("change", function() {
            var extraBedInput = document.getElementById("extra_bed");
            extraBedInput.style.display = this.checked ? "block" : "none";
        });
    });
</script>

@endsection