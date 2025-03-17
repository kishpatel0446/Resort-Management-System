@extends('layouts.admin')

@section('title', 'Daily Booking Report')

@section('content')
<div class="container">
    <h2>All Bookings Report</h2>
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.daily_booking') ? 'active' : '' }}"
                href="{{ route('reports.daily_booking') }}">
                All Bookings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.admin_booking') ? 'active' : '' }}"
                href="{{ route('reports.admin_booking') }}">
                Admin Bookings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.website_booking') ? 'active' : '' }}"
                href="{{ route('reports.website_booking') }}">
                Website Booking
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.agent_booking') ? 'active' : '' }}"
                href="{{ route('reports.agent_booking') }}">
                Agent Booking
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reports.school_picnic') ? 'active' : '' }}"
                href="{{ route('reports.school_picnic') }}">
                School Booking
            </a>
        </li>
    </ul>
</div>
@endsection