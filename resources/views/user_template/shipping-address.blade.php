@extends('user_template.layouts.sneat')
@section('page_title')
    Printly | Shipping Address
@endsection
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Shipping Info</h4>
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Shipping Product Informations</h5>
                        <small class="text-muted float-end">Please Input Valid Informations</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add-shipping-address') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="recipient_name">Recipient Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="recipient_name" name="recipient_name"
                                        placeholder="Input Recipient Name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="recipient_address">Recipient Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="recipient_address" name="recipient_address"
                                        placeholder="Input Recipient Address" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="recipient_phone">Recipient Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="recipient_phone" name="recipient_phone"
                                        placeholder="Input Active Phone Number" />
                                </div>
                            </div>



                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add Address</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- FIELD FOR SIMPLE ADD PRODUCT --}}
    {{-- <div class="container-xxl flex-grow-1 container-p-y">
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
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Printer Name" />
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Brand Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Printer Brands" />
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="price">Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" id="price" class="form-control"
                                        placeholder="Printer's price in dollars" name="price" />
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
    </div> --}}
@endsection
