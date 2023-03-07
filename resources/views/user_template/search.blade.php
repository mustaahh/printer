@extends('user_template.layouts.sneat')
@section('page_title')
    Printly | Product Details
@endsection
@section('main-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 " id="best-sellers"><span class="text-muted fw-light">Search :</span> {{ $search }}</h4>
    @if (count($data) <= 0)
    <div class="misc-wrapper text-center">
        <h2 class="mb-2 mx-2">"{{ $search }}" Not Found :(</h2>
        <p class="mb-4 mx-2">Oops! 😖 The Product or descriptions you search was not found on this server.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>
        <div class="mt-3">
          <img
            src=" {{ asset('dashboard/assets/img/illustrations/page-misc-error-light.png') }}"
            alt="page-misc-error-light"
            width="500"
            class="img-fluid"
            data-app-dark-img="illustrations/page-misc-error-dark.png"
            data-app-light-img="illustrations/page-misc-error-light.png"
          />
        </div>
      </div>
        {{-- <h4 class="text-secondary">"{{ $search }}" Cannot Be Found!</h4> --}}
    @endif
    <div class="row">
        @foreach ($data as $stock)
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
</div>
@endsection
