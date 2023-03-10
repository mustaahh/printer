@extends('user_template.layouts.profile_template')
@section('page_title')
    Printly | History Order
@endsection
@section('history', 'active')
@section('profile-content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show mx-3">
    {{ session()->get('message') }}
    <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h5 class="fw-bold">PENDING ORDERS</h5>
<table class="table table-striped table-borderless">
    <thead>
        <tr>
            <th>No</th>
            <th>Recipient Name</th>
            <th>Quantity</th>
            <th>Price Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($history_order as $pending_order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pending_order->recipient_name }}</td>
                <td>{{ $pending_order->quantity }}</td>
                <td class="text-info">${{ $pending_order->total_price }}</td>
                <td>
                    @if ($pending_order->status == 'success')
                        <span class="badge bg-label-success">{{ $pending_order->status}}</span>
                    @else
                        <span class="badge bg-label-danger">REJECTED</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
{{-- @if ($pending_order->status == "success")
                            <span class="badge bg-label-success">{{ $pending_order->status}}</span>
                        @else
                            <span class="badge bg-label-secondary">{{ $pending_order->status}}</span>
                        @endif --}}
