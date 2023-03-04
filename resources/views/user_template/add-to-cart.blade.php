@extends('user_template.layouts.sneat')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Cart</h4>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">All Products In Your Cart</h5>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mx-3">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive m-4">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Price Total</th>
                            <th>Actions</th>
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
                            <td>
                                <a href="{{ route('remove-cart-item', $cart_item->id) }}" class="btn btn-warning">Remove</a>
                            </td>
                        </tr>

                        @php
                            $total += $cart_item->price;
                        @endphp

                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><h4 class="fw-bold m-auto">TOTAL</h4></td>
                            <td><h4 class="fw-bold text-info m-auto">${{ $total }}</h4></td>
                            @if ($total <= 0)
                            <td>
                                <a href="" class="btn btn-info disabled">There's no item in your cart</a>
                            </td>
                            @else
                            <td>
                                <a href="" class="btn btn-info">Checkout All Items</a>
                            </td>
                            @endif
                        </tr>

                        
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Bootstrap Table with Header - Light -->
    </div>
@endsection
