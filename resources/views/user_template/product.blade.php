@extends('user_template.layouts.sneat')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-5">
            <div class="col-md">
                <div class="card mb-3">
                    <div class="row g-0">   
                        <div class="col-md-5">
                            <img class="card-img  m-4" src="{{ asset($single_product->stock_img) }}"
                                alt="Card image" />
                        </div>
                        <div class="col-md-6">
                            <div class="card-body m-4">
                                <h3 class="card-title fw-bold">{{ $single_product->product_name }}</h3>
                                <h5 >Brand : <span class="badge bg-label-primary">{{ $single_product->brand_name }}</span></h5>
                                <p class="card-text text-muted">
                                    {{ $single_product->stock_desc }}
                                </p>
                                <h4 class="text-info">${{ $single_product->price }}</h4>
                                <h5 class="card-text">Available Stock : <span class="badge bg-label-info">{{ $single_product->quantity }} Pcs</span></h5>
                                <form action="{{ route('add-product-to-cart', $single_product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $single_product->id }}" name="stock_id">
                                    <input type="hidden" value="{{ $single_product->price }}" name="price">
                                    <input type="number" class="form-control" min="1" placeholder="How many pcs do you want?" name="quantity" id="quantity">
                                    <input type="submit" class="btn btn-info mt-2" value="Add to cart">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
