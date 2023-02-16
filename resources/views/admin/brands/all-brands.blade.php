@extends('admin.layouts.template')

@section('page_title')
Admin | All Brands
@endsection
@section('all-brands', 'active')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Printer Brands</h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Avaliable Printer Brand</h5>
        @if ( session()-> has('message') )
        <div class="alert alert-success">
          {{ session() -> get('message') }}
        </div>
          
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No

                  </th>
                  <th>Brand Name</th>
                  <th>Number Of Product</th>
                  <th>Product Stock</th>
                  <th>Slug</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $brands as $brand )
                  
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $brand -> brand_name }}</td>
                  <td>{{ $brand -> product_count }}</td>
                  <td>{{ $brand -> product_count }}</td>
                  <td>{{ $brand -> slug }}</td>
                  <td>
                    <a href="{{ route('edit-brand', $brand->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('delete-brand', $brand->id) }}" class="btn btn-danger">Delete</a>
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