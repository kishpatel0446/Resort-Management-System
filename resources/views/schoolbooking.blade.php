@extends('layouts.app')

@section('title', 'Contact Us - Ambik Riverside Camp & Resorts')

@section('content')
<style>
    .contact-container {
        max-width: 900px;
        margin: 50px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        font-family: 'Poppins', sans-serif;
    }
    .contact-container h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 28px;
        font-weight: 600;
    }
    .table-form {
        width: 100%;
        border-collapse: collapse;
    }
    .table-form th, .table-form td {
        padding: 12px;
        font-size: 16px;
    }
    .table-form th {
        background-color: #F1F5F8; /* Soft light blue background */
        color: #333;
        text-align: left;
        font-weight: 600;
    }
    .table-form td {
        background-color: #f9f9f9;
    }
    .table-form input, .table-form select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        transition: 0.3s;
    }
    .table-form input:focus, .table-form select:focus {
        border-color: #00aaff;
        box-shadow: 0 0 5px rgba(0, 170, 255, 0.3);
    }
    .submit-btn {
        background:rgb(38, 0, 255);
        color: #fff;
        padding: 12px 15px;
        font-size: 18px;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
        display: block;
        width: 100%;
        margin-top: 15px;
        text-align: center;
    }
    .submit-btn:hover {
        background: #0077cc;
    }
    .alert {
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 8px;
        font-size: 16px;
        background: #f9f9f9;
        border-left: 5px solid #00aaff;
    }
    .alert h5 {
        color: #00aaff;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
    }
    .alert ul {
        padding-left: 20px;
    }
</style>

<div class="contact-container">
    <h1>School Booking Form</h1>
    <form method="POST" action="{{ route('submit.schoolbooking') }}">
        @csrf
        <table class="table-form">
            <tbody>
                <tr>
                    <th>School Name</th>
                    <td colspan="3"><input type="text" id="sname" name="sname" placeholder="Enter School Name" required></td>
                </tr>
                <tr>
                    <th>School Address</th>
                    <td><input type="text" id="addr" name="addr" placeholder="Enter School Address" required></td>
                    <th>Mobile No</th>
                    <td><input type="text" id="cn" name="cn" placeholder="Enter Mobile No of Co-ordinator" required></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input type="date" id="date" name="date" required></td>
                    <th>Time</th>
                    <td>
                        <select name="time" id="time" required>
                            <option value="">Select Time</option>
                            <option value="9:30 to 05 (RS.675)">9:30 to 05 (RS.675)</option>
                            <option value="9:30 to 05 (RS.700)">9:30 to 05 (RS.700)</option>
                            <option value="9:30 to 09 (RS.900)">9:30 to 09 (RS.900)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Kids</th>
                    <td><input type="number" id="stud" name="stud" placeholder="Enter Number of Students" min="0" required></td>
                    <th>Teachers</th>
                    <td><input type="number" id="teacher" name="teacher" placeholder="Enter Number of Teachers" min="0" required></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="submit-btn"><i class="fas fa-check-circle"></i> Confirm Booking</button>
    </form>
</div>

<div class="alert">
    <h5>Important Notes</h5>
    <ul>
        <li>You have to make 30% Payment in Advance for confirm booking</li>
        <li>Change in persons can be accepted</li>
        <li>Taxes will be applicable extra on all the mentioned rates.</li>
        <li>No refund policy.</li>
    </ul>
</div>

@endsection
