@extends('admin.layouts.template')

@section('page_title')
Admin | Stocks Management
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
     <!-- Basic Layout & Basic with Icons -->
     <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">New Product</h5>
              <small class="text-muted float-end">Input Valid Printer Product</small>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" placeholder="Printer Name" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="brand_name">Printer Brand</label>
                  <div class="col-sm-10">
                    <div>
                        <select class="form-select" id="brand_name" aria-label="Default select example">
                          <option selected>Selected</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_price">Price</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input
                        type="number"
                        id="product_price"
                        class="form-control"
                        placeholder="Printer's price in rupiah"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_qty">Product Quantity</label>
                  <div class="col-sm-10">
                    <input
                      type="number"
                      id="product_qty"
                      class="form-control"
                      placeholder="Product Quantity"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="product_description">Spesification</label>
                  <div class="col-sm-10">
                    <textarea
                      id="product_description"
                      class="form-control"
                      placeholder="Spesification of printer's product"
                    ></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="product_img" class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" />
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