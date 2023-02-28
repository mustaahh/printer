@extends('admin.layouts.template')

@section('page_title')
Admin | Stocks Management
@endsection
@section('add-products', 'active')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
     <!-- Basic Layout & Basic with Icons -->
     <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">New Product Name</h5>
              <small class="text-muted float-end">Input Valid Printer Product</small>
            </div>
            <div class="card-body">
              <form action="{{ route('store-product') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="brand_name">Printer Brand</label>
                  <div class="col-sm-10">
                    <div>
                        <select class="form-select" id="brand_id" name="brand_id" aria-label="Default select example">
                          <option selected>Select Brand</option>
                          @foreach ( $brands as $brand )
                          <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" placeholder="Printer Name" name="product_name"/>
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