@extends('user_template.layouts.sneat')
@section('page_title')
    Printly | Checkout
@endsection
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md">
                <div class="card mb-3 mt-4">
                    <div class="row g-0">
                        <div class="col-md-4 ">
                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-4">Your Product Will Send At -</h5>
                                <div class="list-group list-group-flush">
                                    <p class="list-group-item"><span class="fw-bold">Recipient</span>
                                        : {{ $shipping_address->recipient_name }}</p>
                                    <p class="list-group-item"><span class="fw-bold">Address</span> :
                                        {{ $shipping_address->recipient_address }}</p>
                                    <p class="list-group-item"><span class="fw-bold">Phone
                                            Number</span> : {{ $shipping_address->recipient_phone }}</p>
                                </div>
                                <div class="d-flex flex-row bd-highlight ">


                            <form action="{{ route('place-order') }}" method="POST" class="m-2">
                                @csrf
                                <input type="submit" value="Place Order" class="btn btn-primary">
                            </form>
                            <form action="" method="POST" class="m-2">
                                @csrf
                                <input type="submit" value="Cancel Order" class="btn btn-danger">
                            </form>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Your Final
                                    Products Order Are -</h5>
                            </div>
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_items as $cart_item)
                                        <tr>
                                            @php
                                                $product_name = App\Models\Stocks::where('id', $cart_item->product_id)->value('product_name');
                                                $product_img = App\Models\Stocks::where('id', $cart_item->product_id)->value('stock_img');
                                            @endphp
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product_name }}</td>
                                            <td><img src="{{ asset($product_img) }}" alt="" width="100"></td>
                                            <td>{{ $cart_item->quantity }}</td>
                                            <td class="text-info">${{ $cart_item->price }}</td>

                                        </tr>
                                        @php
                                            $total += $cart_item->price;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><h4 class="fw-bold m-2 p-2">TOTAL</h4></td>
                                        <td><h4 class="fw-bold text-info m-2 p-2">${{ $total }}</h4></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
