@extends('admin.layouts.template')

@section('page_title')
    Admin | Stocks Management
@endsection
@section('add-stocks', 'active')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Stocks Image</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product Image</h5>
                        <small class="text-muted float-end">Input Valid Printer Image</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-stock-image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="stock_img" class="col-sm-2 col-form-label">Previous Image</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($stock_info->stock_img) }}" width="200" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stock_img" class="col-sm-2 col-form-label">New Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="stock_img" name="stock_img" />
                                </div>
                            </div>

                            <input type="hidden" value="{{ $stock_info->id }}" name="id">



                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
