@extends('layouts.admin')

@section('content')

<style>
    .report-container {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 2px solid #007BFF;
    }

    .nav-tabs {
        border-bottom: none;
        display: flex;
        justify-content: center;
        background: #007BFF;
        border-radius: 10px 10px 0 0;
        padding: 5px;
    }

    .nav-tabs .nav-item .nav-link {
        font-weight: bold;
        font-size: 16px;
        color: white;
        padding: 12px 20px;
        transition: 0.3s;
        border-radius: 8px;
        margin: 2px;
    }

    .nav-tabs .nav-item .nav-link.active {
        background: white;
        color: #007BFF;
        border-bottom: none;
        font-weight: bold;
    }

    .nav-tabs .nav-item .nav-link:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
    }

    .tab-content {
        border-top: none;
        padding: 25px;
        background: white;
        border-radius: 0 0 10px 10px;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tab-pane {
        animation: fadeEffect 0.5s;
    }

    @keyframes fadeEffect {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    h2 {
        font-weight: bold;
        color: #333;
    }
</style>

<div class="container mt-4">
    <div class="report-container">
        <h2 class="text-center mb-4">📊 Purchase Reports</h2>

        <ul class="nav nav-tabs" id="reportTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#itemWiseReport">📦 Item Wise Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#vendorWiseReport">🏢 Vendor Wise Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#dateWiseReport">📅 Date Wise Report</a>
            </li>
        </ul>

        <div class="tab-content mt-0">
            <div class="tab-pane fade show active" id="itemWiseReport">
                @include('reports.partials.item_wise_report', ['items' => $items])
            </div>
            <div class="tab-pane fade" id="vendorWiseReport">
                @include('reports.partials.vendor_wise_report', ['vendors' => $vendors])
            </div>
            <div class="tab-pane fade" id="dateWiseReport">
                @include('reports.partials.date_wise_report', ['purchases' => $purchases])
            </div>
        </div>
    </div>
</div>

@endsection
