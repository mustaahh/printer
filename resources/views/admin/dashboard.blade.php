@extends('admin.layouts.template')
@section('page_title')
    Admin Dashboard | Printly
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Dashboard</h4>
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card p-3 shadow-sm">
                    <h5 class="card-title mt-3">Epson L210</h5>
                    <img src="{{ asset('dashboard/assets/img/elements/1.jpg') }}" class="img-fluid d-flex mx-auto my-4 "
                        alt="">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, nostrum.</p>
                    <div class="demo-inline-spacing">
                        <h5 class="text-info" >Rp.200.000</h5>
                    </div>
                    <div class="demo-inline-spacing">
                        <button type="button" class="btn btn-info">Add</button>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card p-3 shadow-sm">
                    <h5 class="card-title mt-3">Epson L210</h5>
                    <img src="{{ asset('dashboard/assets/img/elements/1.jpg') }}" class="img-fluid d-flex mx-auto my-4 "
                        alt="">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, nostrum.</p>
                    <div class="demo-inline-spacing">
                        <span class="badge bg-label-info">Rp.200.000</span>
                    </div>
                    <div class="demo-inline-spacing">
                        <button type="button" class="btn btn-info">Add</button>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card p-3 shadow-sm">
                    <h5 class="card-title mt-3">Epson L210</h5>
                    <img src="{{ asset('dashboard/assets/img/elements/1.jpg') }}" class="img-fluid d-flex mx-auto my-4 "
                        alt="">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, nostrum.</p>
                    <div class="demo-inline-spacing">
                        <span class="badge bg-label-info">Rp.200.000</span>
                    </div>
                    <div class="demo-inline-spacing">
                        <button type="button" class="btn btn-info">Add</button>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection
@section('dashboard', 'active')
