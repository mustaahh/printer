<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function Index () {
        return view ('admin.products.all-products');
    }

    public function AddProduct () {
        return view ('admin.products.add-product');
    }
}
