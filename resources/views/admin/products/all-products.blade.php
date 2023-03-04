@extends('admin.layouts.template')

@section('page_title')
Admin | All Products
@endsection
@section('all-products', 'active')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Printer Products</h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Avaliable Printer Products</h5>
        @if ( session()-> has('message') )
          <div class="alert alert-success alert-dismissible fade show mx-3">
            {{ session() -> get('message') }}
            <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="table-responsive m-4">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Product Name</th>
                  <th>Brand Name</th>
                  <th>Product Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)



                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->brand_name }}</td>
                  <td>{{ $product->stock_count }}</td>
                  <td>
                    <a href="{{ route('edit-product', $product->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('delete-product', $product->id) }}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
      <!-- Bootstrap Table with Header - Light -->
</div>
@endsection
