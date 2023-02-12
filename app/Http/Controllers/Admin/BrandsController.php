<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function Index () {
        return view ('admin.brands.all-brands');
    }

    public function AddBrand () {
        return view ('admin.brands.add-brand');
    }
}
