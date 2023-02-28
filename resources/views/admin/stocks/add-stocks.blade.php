@extends('admin.layouts.template')

@section('page_title')
    Admin | Stocks Management
@endsection
@section('add-stocks', 'active')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Stocks</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">New Product Stocks</h5>
                        <small class="text-muted float-end">Input Valid Printer Product</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store-stocks') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="brand_id">Printer Brand</label>
                                <div class="col-sm-10">
                                    <div>
                                        <select class="form-select" id="brand_id" name="brand_id"
                                            aria-label="Default select example">
                                            <option selected>Select Printer Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="product_id">Printer Name</label>
                                <div class="col-sm-10">
                                    <div>
                                        <select class="form-select" id="product_id" name="product_id"
                                            aria-label="Default select example">
                                            <option selected>Select Product Name</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="price">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="price" class="form-control"
                                            placeholder="Printer's price in rupiah" name="price" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="quantity">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" id="quantity" class="form-control" placeholder="Product Quantity"
                                        name="quantity" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="stock_desc">Spesification</label>
                                <div class="col-sm-10">
                                    <textarea id="stock_desc" class="form-control" placeholder="Spesification of printer's product"
                                        name="stock_desc"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stock_img" class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="stock_img" name="stock_img" />
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
