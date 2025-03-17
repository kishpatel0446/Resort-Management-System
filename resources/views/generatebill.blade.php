@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Generate Bill</h1>
    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                value="{{ isset($websiteBooking) ? $websiteBooking->name : (isset($adminBooking) ? $adminBooking->name : (isset($agentBooking) ? $agentBooking->agentname : '')) }}" required>
        </div>
        <div class="mb-3">
            <label for="contact_no" class="form-label">Contact No</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no"
                value="{{ isset($websiteBooking) ? $websiteBooking->cn : (isset($adminBooking) ? $adminBooking->cn : (isset($agentBooking) ? $agentBooking->cn : '')) }}" required>
        </div>
        <div class="mb-3">
            <label for="booking_date" class="form-label">Booking Date</label>
            <input type="date" class="form-control" id="booking_date" name="booking_date"
                value="{{ isset($websiteBooking) ? \Carbon\Carbon::parse($websiteBooking->date)->format('Y-m-d') : (isset($adminBooking) ? \Carbon\Carbon::parse($adminBooking->date)->format('Y-m-d') : (isset($agentBooking) ? \Carbon\Carbon::parse($agentBooking->date)->format('Y-m-d') : '')) }}" required>
        </div>
        <div class="mb-3">
            <label for="time_slot" class="form-label">Time Slot</label>
            <select name="time_slot" id="time_slot" class="form-control" required>
                <option value="{{ isset($websiteBooking) ? $websiteBooking->time : (isset($adminBooking) ? $adminBooking->time : (isset($agentBooking) ? $agentBooking->time : '')) }}">
                    {{ isset($websiteBooking) ? $websiteBooking->time : (isset($adminBooking) ? $adminBooking->time : (isset($agentBooking) ? $agentBooking->time : '')) }}
                </option>
                <option value="09 to 09">09 to 09 (RS.1500)</option>
                <option value="09 to 05">09 to 05 (RS.1200)</option>
                <option value="11 to 09">11 to 09 (RS.1350)</option>
                <option value="04 to 09">04 to 09 (RS.850)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kids" class="form-label">Number of Kids</label>
            <input type="number" class="form-control" id="kids" name="kids"
                value="{{ isset($websiteBooking) ? $websiteBooking->kids : (isset($adminBooking) ? $adminBooking->kids : (isset($agentBooking) ? $agentBooking->kids : '')) }}" min="0" required>
        </div>
        <div class="mb-3">
            <label for="rate_kids" class="form-label">Rate per Kid</label>
            <input type="number" class="form-control" id="rate_kids" name="rate_kids"
                value="{{ isset($websiteBooking) ? $websiteBooking->rate_kids : (isset($adminBooking) ? $adminBooking->kids_rate : (isset($agentBooking) ? $agentBooking->kids_rate : '')) }}" min="0" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="adults" class="form-label">Number of Adults</label>
            <input type="number" class="form-control" id="adults" name="adults"
                value="{{ isset($websiteBooking) ? $websiteBooking->adults : (isset($adminBooking) ? $adminBooking->adults : (isset($agentBooking) ? $agentBooking->adults : '')) }}" min="0" required>
        </div>
        <div class="mb-3">
            <label for="rate_adults" class="form-label">Rate per Adult</label>
            <input type="number" class="form-control" id="rate_adults" name="rate_adults"
                value="{{ isset($websiteBooking) ? $websiteBooking->rate_adults : (isset($adminBooking) ? $adminBooking->adults_rate : (isset($agentBooking) ? $agentBooking->adults_rate : '')) }}" min="0" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" class="form-control" id="discount" name="discount"
                value="{{ isset($websiteBooking) ? $websiteBooking->discount : (isset($adminBooking) ? $adminBooking->discount : (isset($agentBooking) ? $agentBooking->discount : '')) }}" min="0" step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Generate Bill</button>
    </form>
</div>
@endsection
