@extends('layouts.admin')

@section('content')
<h2 class="custom-heading">Online Room Bookings</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Contact</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Rooms Required</th>
            <th>Room Price</th>
            <th>Extra Bed</th>
            <th>Price</th>
            <th>Total</th>
            <th>Advance</th>
            <th>Discount</th>
            <th>Net Amount</th>
            <th>Checked-out At</th>
            <th>Booked By</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($onlineBookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->customer_name }}</td>
            <td>{{ $booking->customer_phone }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-m-Y') }}</td>
            <td>{{ $booking->num_rooms }}</td>
            <td>₹ {{ number_format($booking->price, 2) }}</td>
            <td>{{ $booking->extra_bed }}</td>
            <td>₹ {{ number_format($booking->extra_bed_price, 2) }}</td>
            <td>₹ {{ number_format($booking->total_price, 2) }}</td>
            <td>₹ {{ number_format($booking->advance, 2) }}</td>
            <td>₹ {{ number_format($booking->discount, 2) }}</td>
            <td>₹ {{ number_format($booking->netamount, 2) }}</td>
            <td>{{ $booking->checkout_date_time }}</td>
            <td>Online</td>
            <td>
            <span class="badge custom-status-badge {{ $booking->status === 'confirmed' ? 'confirmed' : 'pending' }}">
    {{ ucfirst($booking->status) }}
</span>

            </td>
            <td id="bookingActions-{{ $booking->id }}">
                @if($booking->status !== 'confirmed')
                <button type="button" 
                        class="btn btn-primary select-room-trigger"
                        data-booking-id="{{ $booking->id }}"
                        data-num-rooms="{{ $booking->num_rooms }}"
                        data-route="{{ route('online.bookings.allot', $booking->id) }}"
                        data-available-rooms="{{ json_encode($availableRooms) }}">
                    Allot Room(s)
                </button>
                @else
                <span class="badge custom-badge">
                    Room Number(s): {{ $booking->rooms->pluck('room_number')->implode(', ') }}
                </span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="roomSelectionBox" class="room-selection-box">
    <div class="room-selection-content">
        <h4>Select Room(s)</h4>
        <form id="roomSelectionForm" method="POST">
            @csrf
            <input type="hidden" id="selectedBookingId">
            <div class="room-list"></div>
            <button type="submit" class="btn btn-primary mt-2">Confirm Selection</button>
            <button type="button" class="btn btn-danger mt-2" onclick="closeRoomSelectionBox()">Cancel</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".select-room-trigger").forEach((trigger) => {
        trigger.addEventListener("click", function (e) {
            e.preventDefault();

            let bookingId = this.dataset.bookingId;
            let numRooms = parseInt(this.dataset.numRooms, 10);
            let route = this.dataset.route;
            let availableRooms = JSON.parse(this.dataset.availableRooms);

            showRoomSelectionBox(bookingId, numRooms, availableRooms, route);
        });
    });

    document.getElementById("roomSelectionForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);
        let actionUrl = form.action;
        let bookingId = document.getElementById("selectedBookingId").value;

        let csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        let csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute("content") : null;

        if (!csrfToken) {
            alert("CSRF token missing! Please check your HTML <head> section.");
            return;
        }

        fetch(actionUrl, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json"
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => { throw new Error(errorData.message); });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert("Room(s) successfully allotted!");
                closeRoomSelectionBox();

                
                let bookingActions = document.getElementById(`bookingActions-${bookingId}`);
                bookingActions.innerHTML = `<span class="badge badge-success">Room Number(s): ${data.room_numbers}</span>`;
            } else {
                alert(data.message || "Error allotting rooms. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert(error.message || "Something went wrong! Check console for details.");
        });
    });
});

function showRoomSelectionBox(bookingId, numRooms, availableRooms, route) {
    let selectionBox = document.getElementById("roomSelectionBox");
    let form = document.getElementById("roomSelectionForm");
    let roomList = selectionBox.querySelector(".room-list");

    document.getElementById("selectedBookingId").value = bookingId;

    form.action = route;
    roomList.innerHTML = "";

    availableRooms.forEach(room => {
        let inputType = numRooms > 1 ? "checkbox" : "radio";
        let roomItem = `<div class="room-item">
                            <input type="${inputType}" name="room_id[]" value="${room.id}" id="room_${room.id}">
                            <label for="room_${room.id}">${room.room_number} (${room.room_type})</label>
                        </div>`;
        roomList.innerHTML += roomItem;
    });

    selectionBox.classList.add("show");
}

function closeRoomSelectionBox() {
    let selectionBox = document.getElementById("roomSelectionBox");
    selectionBox.classList.remove("show");
}
</script>

<style>
.room-selection-box {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    width: 320px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    display: none;
    z-index: 9999;
}
.room-selection-box.show {
    display: block;
}
.room-selection-content {
    text-align: center;
}
.room-list {
    max-height: 200px;
    overflow-y: auto;
    margin-top: 10px;
}
.room-item {
    margin-bottom: 8px;
}
.room-item input {
    margin-right: 5px;
}
th {
        background-color: black !important;
        color: white !important;
        font-size: 16px;
        text-align: center;
        white-space: nowrap;
        border: 1px solid white !important;
    }

    td {
        font-size: 15px;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid black !important;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .badge {
        font-size: 12px;
        padding: 5px 8px;
    }
    th:first-child {
    border-left: 1px solid black !important;
}

th:last-child {
    border-right: 1px solid black !important;
}
.custom-badge {
    background-color: #28a745;
    color: white;              
    padding: 5px 10px;        
    border-radius: 5px;         
}
.custom-status-badge {
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 12px;
    font-weight: bold;
}

.custom-status-badge.confirmed {
    background-color: #28a745;;
}

.custom-status-badge.pending {
    background-color: #ffc107;
    color: black;
}

</style>
@endsection
