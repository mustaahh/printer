@extends('user_template.layouts.sneat')
@section('page_title')
    Printly | Home
@endsection
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4" id="brands"><span class="text-muted fw-light">Printly/</span> All Brands</h4>
        <div class="row mb-5">
            @foreach ($brands as $brand)
                <div class="col-md-6 col-lg-2 m-1">
                    <a href="{{ route('brand-page', [$brand->id, $brand->slug]) }}" class="card p-3 shadow-sm " >
                        {{-- <img src="{{ asset('dashboard/assets/img/elements/epson-logo.png') }}" class="img-fluid d-flex my-2 rounded"
                        alt=""> --}}
                        {{ $brand->brand_name }}
                    </a>
                </div>
            @endforeach
        </div>


        <h4 class="fw-bold py-3 mb-4 " id="best-sellers"><span class="text-muted fw-light">Product/</span> Best Sellers</h4>
        <div class="row mb-5">
            @foreach ($best_sellers as $stock)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card p-3 shadow-sm">
                        <img src="{{ asset($stock->stock_img) }}" class="img-fluid d-flex my-2 rounded" alt="">
                        <div class="demo-inline-spacing">
                            <span class="badge bg-label-primary">{{ $stock->brand_name }}</span>
                        </div>
                        <h5 class="card-title mt-3 ">{{ $stock->product_name }}</h5>
                        <p class="card-text text-muted">{{ $stock->stock_desc }}</p>
                        <h4 class="text-info">${{ $stock->price }}</h4>
                        <a href="{{ route('single-product', [$stock->id, $stock->slug]) }}" class="btn btn-info">
                        Buy Now
                        </a>
                    </div>
                </div>
            @endforeach


        </div>

        {{-- DISPLAY ALL PRODUCT FROM DATA BASE --}}
        <h4 class="fw-bold py-3 mb-4" id="home-products"><span class="text-muted fw-light">Product/</span> All Products
        </h4>
        <div class="row mb-5">
            @foreach ($all_stocks as $stock)
                <div class="col-md-6 col-lg-3 mb-3">
                    <a href="{{ route('single-product', [$stock->id, $stock->slug]) }}" class="card p-3 shadow-sm">
                        <img src="{{ asset($stock->stock_img) }}" class="img-fluid d-flex my-2 rounded" alt="">
                        <div class="demo-inline-spacing">
                            <span class="badge bg-label-primary">{{ $stock->brand_name }}</span>
                        </div>
                        <h5 class="card-title mt-3 ">{{ $stock->product_name }}</h5>
                        <p class="card-text text-muted">{{ $stock->stock_desc }}</p>
                        <h4 class="text-info">${{ $stock->price }}</h4>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
@endsection
