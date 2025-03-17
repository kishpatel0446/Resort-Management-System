@extends('layouts.admin')

@section('content')

<style>
    /* Container spacing to adjust sidebar gap */
    .content-container {
        max-width: 600px;
        margin: 0 auto; /* Centering the form */
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Form Input Fields */
    .form-control {
        border-radius: 8px;
        padding: 10px;
        border: 1px solid #ced4da;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #007BFF;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Labels */
    label {
        font-weight: bold;
        color: #333;
        margin-bottom: 6px;
        display: block;
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, #007BFF, #0056B3);
        color: white;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 8px;
        display: block;
        width: 100%;
        text-align: center;
        transition: 0.3s;
        border: none;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #0056B3, #004085);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Page Title */
    .page-title {
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #007BFF;
        text-transform: uppercase;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="content-container">
    <h2 class="page-title">✏ Edit Package</h2>

    <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Time</label>
            <input type="text" name="time" class="form-control" value="{{ $package->time }}" required>
        </div>

        <div class="mb-3">
            <label>Details</label>
            <input type="text" name="details" class="form-control" value="{{ $package->details }}" required>
        </div>

        <div class="mb-3">
            <label>Price (Rs.)</label>
            <input type="number" name="price" class="form-control" value="{{ $package->price }}" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="picnic" {{ $package->type == 'picnic' ? 'selected' : '' }}>Picnic Package</option>
                <option value="room" {{ $package->type == 'room' ? 'selected' : '' }}>Room Price</option>
            </select>
        </div>

        <button type="submit" class="btn btn-submit">✔ Update Package</button>
    </form>
</div>

@endsection
