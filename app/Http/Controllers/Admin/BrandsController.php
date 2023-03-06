<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function Index () {
        $brands = Brands::latest()->get();
        return view ('admin.brands.all-brands', compact('brands'));
    }

    public function AddBrand () {
        return view ('admin.brands.add-brand');
    }

    public function StoreBrand ( Request $request ) {
        $request->validate([
            'brand_name' => 'required|unique:brands',

        ]);

        Brands::insert([
        'brand_name' => $request->brand_name,

        'slug' => strtolower(str_replace(' ', '-', $request->brand_name)) ]);
        return redirect()->route('all-brands')->with( 'message', 'Brand Added Successfully!' );
    }

    public function EditBrand ($id) {
        $brand_info = Brands::findOrFail($id);

        return view ('admin.brands.edit-brand', compact('brand_info'));

    }

    public function UpdateBrand (Request $request ) {
        $brand_id = $request->brand_id;

        $request->validate([
            'brand_name' => 'required|unique:brands'
        ]);

        Brands::findOrFail($brand_id)-> update([
            'brand_name' => $request->brand_name,
            'slug' => strtolower(str_replace(' ', '-', $request->brand_name))

        ]);
        return redirect()->route('all-brands')->with( 'message', 'Brand Updated Successfully!' );

    }

    public function DeleteBrand ($id) {
        Brands::findOrFail($id)->delete();

        return redirect()->route('all-brands')->with('message', 'Brand Deleted Successfully!');
    }



}
