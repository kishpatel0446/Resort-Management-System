@extends('layouts.admin')

@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert" id="successMessage">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>
@endif

<div class="container">
    <h2>Create New Booking</h2>

    <form action="{{ route('admin.bookings.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tr>
                <td><label for="name" class="form-label">Guest Name</label></td>
                <td><input type="text" class="form-control" id="name" name="name" required></td>

                <td><label for="cn" class="form-label">Contact No</label></td>
                <td><input type="text" class="form-control" id="cn" name="cn" required></td>
            </tr>

            <tr>
                <td><label for="date" class="form-label">Booking Date</label></td>
                <td><input type="date" class="form-control" id="date" name="date" required></td>

                <td><label for="time" class="form-label">Time</label></td>
                <td>
                    <select name="time" id="time" class="form-control" required>
                        <option value="">Select Time</option>
                        <option value="09 to 09">09 to 09 (RS.1500)</option>
                        <option value="09 to 05">09 to 05 (RS.1200)</option>
                        <option value="11 to 09">11 to 09 (RS.1350)</option>
                        <option value="04 to 09">04 to 09 (RS.850)</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="adults" class="form-label">Adults</label></td>
                <td><input type="number" class="form-control" id="adults" name="adults" min=0 required oninput="calculateAmount()"></td>

                <td><label for="adults_rate" class="form-label">Rate</label></td>
                <td><input type="number" class="form-control" id="adults_rate" name="adults_rate" min=0 required oninput="calculateAmount()"></td>
            </tr>

            <tr>
                <td><label for="kids" class="form-label">Kids</label></td>
                <td><input type="number" class="form-control" id="kids" name="kids" min=0 required oninput="calculateAmount()"></td>

                <td><label for="kids_rate" class="form-label">Rate</label></td>
                <td><input type="number" class="form-control" id="kids_rate" name="kids_rate" readonly></td>
            </tr>

            <tr>
                <td><label for="amount" class="form-label">Amount</label></td>
                <td><input type="number" class="form-control" id="amount" name="amount" readonly></td>

                <td><label for="discount" class="form-label">Discount</label></td>
                <td><input type="number" class="form-control" id="discount" name="discount" min=0 required oninput="calculateAmount()"></td>
            </tr>

            <tr>
                <td><label for="advance" class="form-label">Advance</label></td>
                <td><input type="number" class="form-control" id="advance" name="advance" min=0 required oninput="calculateAmount()"></td>

                <td><label for="netamount" class="form-label">Net Amount</label></td>
                <td><input type="number" class="form-control" id="netamount" name="netamount" readonly></td>
            </tr>

            <input type="hidden" id="kids_rate_hidden" name="kids_rate">

            <tr>
                <td colspan="4" class="text-center">
                    <button type="submit" class="btn btn-primary">Save Booking</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    function calculateAmount() {
        // Get the values from the form fields
        var kids = parseInt(document.getElementById('kids').value) || 0;
        var kidsRate = parseFloat(document.getElementById('kids_rate').value) || 0;
        var adults = parseInt(document.getElementById('adults').value) || 0;
        var adultsRate = parseFloat(document.getElementById('adults_rate').value) || 0;
        var discount = parseFloat(document.getElementById('discount').value) || 0;
        var advance = parseFloat(document.getElementById('advance').value) || 0;

        // Calculate Rate-Kids as 70% of Rate-Adults
        if (adultsRate > 0) {
            kidsRate = adultsRate * 0.7;
            document.getElementById('kids_rate').value = kidsRate.toFixed(2);
            document.getElementById('kids_rate_hidden').value = kidsRate.toFixed(2); // Update hidden field
        }

        // Calculate Amount
        var amount = (kids * kidsRate) + (adults * adultsRate);
        document.getElementById('amount').value = amount.toFixed(2);

        // Calculate Net Amount
        var netAmount = amount - discount;
        document.getElementById('netamount').value = netAmount.toFixed(2);
    }
</script>

@endsection
