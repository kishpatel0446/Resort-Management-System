@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="section-title text-center mb-4">📩 View Inquiries</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inquiries as $inquiry)
                        <tr>
                            <td>{{ $inquiry->id }}</td>
                            <td>{{ $inquiry->name }}</td>
                            <td>{{ $inquiry->email }}</td>
                            <td>{{ $inquiry->mobileno }}</td>
                            <td class="text-start">
                                <div class="message-preview">
                                    {{ Str::limit($inquiry->message, 50) }}
                                </div>
                                @if(strlen($inquiry->message) > 50)
                                    <button class="btn btn-info btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#messageModal{{ $inquiry->id }}">📜 Read More</button>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d-m-Y') }}</td>
                            <td>
                                @if(!$inquiry->handled)
                                    <form action="{{ route('inquiries.markHandled', $inquiry->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">✔ Mark as Handled</button>
                                    </form>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                        </tr>

                        <!-- Modal for Full Message -->
                        <div class="modal fade" id="messageModal{{ $inquiry->id }}" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">📩 Full Inquiry Message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="modal-message">{{ $inquiry->message }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Title Styling */
    .section-title {
        font-size: 28px;
        font-weight: bold;
        color: #2c3e50;
    }

  
    .card {
        border-radius: 10px;
        background: white;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

  
    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .custom-table th {
        background: #34495e;
        color: white;
        padding: 12px;
        text-align: center;
        font-size: 16px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .custom-table td {
        background: white;
        padding: 12px;
        text-align: center;
        font-size: 15px;
        font-weight: 500;
        color: #2c3e50;
        transition: background 0.3s;
    }

    .table {
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
    }
    .custom-table tbody tr:nth-child(even) td {
        background: #f8f9fa;
    }

    /* Hover effect */
    .custom-table tbody tr:hover td {
        background: #ecf0f1;
    }

    /* Message preview */
    .message-preview {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .modal-message {
        font-size: 16px;
        line-height: 1.6;
    }

    /* Buttons */
    .btn-sm {
        font-size: 14px;
        padding: 6px 12px;
        border-radius: 6px;
    }
</style>
@endsection
