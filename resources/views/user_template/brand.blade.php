@extends('user_template.layouts.sneat')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h3 class="fw-bold py-3 mb-4">{{ $brands->brand_name }} - <span class="text-muted">({{ $brands->product_count }}
                Product)</span></h3>
        <div class="row mb-5">
            @foreach ($stocks as $stock)
                <div class="col-md-6 col-lg-3 mb-3">
                    <a href="#" class="card p-3 shadow-sm">
                        <img src="{{ asset($stock->stock_img) }}" class="img-fluid d-flex my-2 rounded" alt="picture">
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
