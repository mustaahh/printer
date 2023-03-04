@extends('admin.layouts.template')

@section('page_title')
    Admin | All Stocks
@endsection
@section('all-stocks', 'active')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Printer Stocks</h4>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">Avaliable Printer Stocks</h5>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show mx-3">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close text-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive m-4">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stock->product_name }}</td>
                                <td>
                                    <img src="{{ asset($stock->stock_img)  }}" width="100" class="d-block mb-2">
                                    <a href="{{ route('edit-stock-image', $stock->id) }}" class="btn btn-primary">Change</a>
                                </td>
                                <td>{{ $stock->price }}</td>
                                <td>{{ $stock->stock_count }}</td>
                                <td>
                                    <a href="{{ route('edit-stock', $stock->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('delete-stock', $stock->id) }}" class="btn btn-danger">Delete</a>
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
