@extends('layouts.admin')

@section('content')
<h2 class="text-center mb-4">📷 Manage Gallery</h2>


<div class="upload-container">
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="upload-box">
            <input type="file" name="images[]" class="form-control" multiple required>
            <button type="submit" class="btn-upload">📤 Upload Images</button>
        </div>
    </form>
</div>


<div class="gallery">
    @foreach($images as $image)
        <div class="gallery-card">
            <img src="{{ asset('uploads/gallery/' . $image->image) }}" alt="Gallery Image">
            <form action="{{ route('gallery.destroy', $image->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">🗑</button>
            </form>
        </div>
    @endforeach
</div>

<style>
    .upload-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .upload-box {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        gap: 10px;
        border: 2px dashed #007BFF;
    }

    .upload-box input {
        flex: 1;
        border: none;
        padding: 8px;
        font-size: 16px;
    }

    .btn-upload {
        background: #007BFF;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-upload:hover {
        background: #0056b3;
    }


    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        padding: 20px;
    }

    .gallery-card {
        position: relative;
        width: 170px;
        height: 170px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease-in-out;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: scale(1.05);
    }

    .delete-form {
        position: absolute;
        top: 8px;
        right: 8px;
    }

    .btn-delete {
        background: rgba(255, 0, 0, 0.8);
        border: none;
        color: white;
        font-size: 14px;
        padding: 6px 10px;
        border-radius: 50%;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-delete:hover {
        background: red;
        transform: scale(1.1);
    }
</style>
@endsection
