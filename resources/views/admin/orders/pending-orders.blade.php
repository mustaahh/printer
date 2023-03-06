@extends('admin.layouts.template')

@section('page_title')
Admin | Pending Orders
@endsection
@section('pending-orders', 'active')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Pending Orders</h4>
    <div class="card">
        <div class="table-responsive m-4">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>Order Id</th>
                  <th>User Id</th>
                  <th>Shipping Information</th>
                  <th>Product Id</th>
                  <th>Quantitiy</th>
                  <th>Total Will Pay</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $pending_orders as $pending_order )

                <tr>
                  <td>{{ $pending_order->id }}</td>
                  <td>{{ $pending_order->user_id }}</td>
                  <td>
                    <div class="list-group list-group-flush">
                        <p class="list-group-item"><span class="fw-bold">Recipient</span>
                            : {{ $pending_order->recipient_name }}</p>
                        <p class="list-group-item"><span class="fw-bold">Address</span> :
                            {{ $pending_order->recipient_address }}</p>
                        <p class="list-group-item"><span class="fw-bold">Phone
                                Number</span> : {{ $pending_order->recipient_phone }}</p>
                    </div>
                  </td>
                  <td>{{ $pending_order->product_id }}</td>
                  <td>{{ $pending_order->quantity }}</td>
                  <td class="text-info">${{ $pending_order->total_price }}</td>
                  <td>
                    <form action="{{ route('confirm-status') }}" method="post" class="mb-2" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $pending_order->id }}">
                        <input type="hidden" name="status" value="success">
                        <button type="submit" name="confirm" class="btn btn-success">Confirm</button>
                    </form>
                    <form action="{{ route('reject-status') }}" method="post" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $pending_order->id }}">
                        <input type="hidden" name="status" value="reject">
                        <button type="submit" name="confirm" class="btn btn-danger">Reject</button>
                    </form>
                  </td>
                </tr>
                {{-- style="background-color: #F55050;" --}}

                @endforeach


              </tbody>
            </table>
          </div>

    </div>

</div>
@endsection
