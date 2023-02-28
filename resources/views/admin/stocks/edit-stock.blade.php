@extends('admin.layouts.template')

@section('page_title')
    Admin | Stocks Management
@endsection
@section('add-stocks', 'active')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Stocks</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product Stocks</h5>
                        <small class="text-muted float-end">Input Valid Printer Product</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-stock') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $stock_info->id }}" name="id">
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="price">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="price" class="form-control"
                                            value="{{ $stock_info->price }}" name="price" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="quantity">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" id="quantity" class="form-control" value="{{ $stock_info->quantity }}"
                                        name="quantity" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="stock_desc">Spesification</label>
                                <div class="col-sm-10">
                                    <textarea id="stock_desc" class="form-control" 
                                        name="stock_desc">{{ $stock_info->stock_desc }}</textarea>
                                </div>
                            </div>
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
