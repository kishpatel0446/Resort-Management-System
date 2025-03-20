@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center text-white mt-4"><i class="fas fa-calendar-check"></i> Your Bookings</h2>

    <div id="step3" class="booking-card">
        <h4 class="text-center"><i class="fas fa-book"></i> Your Bookings</h4>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Adults</th>
                        <th>Kids</th>
                        <th>Amount</th>
                        <th>Booking Mode</th>
                    </tr>
                </thead>
                <tbody id="booking-list">
                    <tr><td colspan="8">Loading...</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetchBookings();
});

function fetchBookings() {
    document.getElementById('booking-list').innerHTML = '<tr><td colspan="8">Loading...</td></tr>';

    fetch('{{ route("fetch.bookings") }}', {
        method: 'GET',
        headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(res => res.json())
    .then(data => {
        let tableBody = document.getElementById('booking-list');
        tableBody.innerHTML = '';

        if (!data.success || data.bookings.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="8">No bookings found</td></tr>';
            return;
        }

        let bookings = data.bookings;

        bookings.forEach(booking => {
            let formattedDate = new Date(booking.date).toLocaleDateString('en-GB');
            let formattedAmount = `Rs. ${parseFloat(booking.netamount).toFixed(2)}`;

            tableBody.innerHTML += `
                <tr>
                    <td>${booking.id}</td>
                    <td>${formattedDate}</td>
                    <td>${booking.name}</td>
                    <td>${booking.cn}</td>
                    <td>${booking.adults}</td>
                    <td>${booking.kids}</td>
                    <td>${formattedAmount}</td>
                    <td>${booking.type}</td>
                </tr>`;
        });
    })
    .catch(err => {
        document.getElementById('booking-list').innerHTML = '<tr><td colspan="8">Error fetching bookings</td></tr>';
        Swal.fire("❌ Error!", "Failed to load bookings. Please try again.", "error");
    });
}
</script>

<style>
body {
    background: linear-gradient(135deg, #0072ff, #00c6ff);
    padding-top: 80px;
}

.booking-card {
    max-width: 95%;
    margin: 40px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
}

.table-responsive {
    max-height: 400px;
    overflow-y: auto;
}

.table {
    border-radius: 10px;
    overflow: hidden;
}

.table-dark {
    background-color: #343a40;
    color: white;
}
</style>

@endsection
