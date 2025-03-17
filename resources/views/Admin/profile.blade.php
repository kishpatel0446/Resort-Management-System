@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Admin Profile</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Role: {{ $user->role ?? 'Admin' }}</p>
        </div>
    </div>
</div>
@endsection
