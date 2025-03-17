@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h1 {
        text-align: center;
        text-transform: uppercase;
    }
    .header, .footer {
        margin-bottom: 20px;
    }
    .header span, .footer {
        display: block;
        margin-bottom: 5px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f4f4f4;
    }
    .text-end {
        text-align: right;
    }
    .summary td {
        font-weight: bold;
    }
    
    .footer{
        text-align: center;
    }
    .print-button {
        text-align: center;
        margin-top: 30px;
    }
    .print-button button {
        padding: 15px 30px;
        background-color:rgb(0, 60, 255);
        color: white;
        border: none;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        transition: background-color 0.3s, transform 0.3s;
    }
    .print-button button:hover {
        background-color:rgb(8, 71, 206); 
        transform: scale(1.05);
    }
    .print-button button:focus {
        outline: none;
    }

    @media print {
    @page {
        margin: 0;
        size: auto;
    }

    body::before,
    body::after {
        display: none;
    }

    .sb-topnav, .sb-sidenav, .navbar-brand  {
        display: none !important;
    }

    body {
        margin: 0;
        padding: 0;
    }
    .print-button {
        display: none !important;
    }
}


</style>

<body>

<h1>Invoice</h1>

<div class="header">
    <span><b>Invoice No:</b> {{ $bill->id }}</span>
    <span><b>Date:</b> {{ \Carbon\Carbon::parse($bill->booking_date)->format('d-m-Y') }}</span>
</div>

<div>
    <b>From:</b><br>
    Ambik Riverside Camp & Resort, Kachholi, Dist: Navsari
</div>

<div style="margin-top: 10px;">
    <b>Customer Name:</b><br>
    {{ $bill->customer_name }}
</div>

<table>
    <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Kids</td>
            <td>{{ $bill->kids }}</td>
            <td>{{ $bill->rate_kids }}</td>
            <td>{{ $bill->total_kids }}</td>
        </tr>
        <tr>
            <td>Adults</td>
            <td>{{ $bill->adults }}</td>
            <td>{{ $bill->rate_adults }}</td>
            <td>{{ $bill->total_adults }}</td>
        </tr>
        <tr>
            <td><b>Time Slot:</b></td>
            <td colspan="3">{{ $bill->time_slot }}</td> 
        </tr>
    </tbody>
    <tfoot>
        <tr class="summary">
            <td colspan="3" class="text-end">Total Amount</td>
            <td>{{ $bill->total_amount }}</td>
        </tr>
        <tr class="summary">
            <td colspan="3" class="text-end">Discount</td>
            <td>{{ $bill->discount }}</td>
        </tr>
        <tr class="summary">
            <td colspan="3" class="text-end">Net Amount</td>
            <td>{{ $bill->net_amount }}</td>
        </tr>
    </tfoot>
</table>
<br>
<div class="print-button">
    <button onclick="window.print()">Download Invoice</button>
</div>
<br>
<div class="footer">
    <b>Thank you for choosing Ambik Riverside Camp & Resort!</b>
</div>



</body>
@endsection
