@extends('admin.layouts.template')

@section('page_title')
Admin | All Brands
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Printer Brands</h4>
    <!-- Bootstrap Table with Header - Light -->
    <div class="card">
        <h5 class="card-header">Avaliable Printer Brand</h5>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Brand Name</th>
                  <th>Number Of Product</th>
                  <th>Product Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>1</td>
                    <td>Epson</td>
                    <td>10</td>
                    <td>240</td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>

                        
                    </td>
                </tr>

                    
                   
              </tbody>
            </table>
          </div>
      </div>
      <!-- Bootstrap Table with Header - Light -->

</div>

@endsection