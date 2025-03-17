@extends('layouts.admin')

@section('content')

<style>
    /* Container to adjust sidebar spacing */
    .content-container {
        max-width: 600px;
        margin: 0 auto;
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
        transition: 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
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
        background: linear-gradient(135deg, #28a745, #218838);
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
        background: linear-gradient(135deg, #218838, #1e7e34);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Page Title */
    .page-title {
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: #28a745;
        text-transform: uppercase;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="content-container">
    <h2 class="page-title">➕ Add Package</h2>

    <form action="{{ route('admin.packages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Time</label>
            <input type="text" name="time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Details</label>
            <input type="text" name="details" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price (Rs.)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="picnic">Picnic Package</option>
                <option value="room">Room Price</option>
            </select>
        </div>

        <button type="submit" class="btn btn-submit">✔ Submit</button>
    </form>
</div>

@endsection
