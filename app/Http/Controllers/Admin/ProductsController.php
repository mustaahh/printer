<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function Index () {
        $products = Products::latest()->get();
        return view ('admin.products.all-products', compact('products'));

    }

    public function AddProduct () {
        $brands = Brands::latest()->get();


        return view ('admin.products.add-product', compact('brands'));
    }

    public function StoreProduct (Request $request) {
        $request->validate([
            'product_name' => 'required|unique:products',
            'brand_id' => 'required'
        ]);

        if ($request->brand_id == 'default') {
            return redirect()->route('add-product')->with( 'error', 'Please Select Valid Brand Name!' );
        }

        $brand_id = $request->brand_id;
        $brand_name = Brands::where('id', $brand_id)->value('brand_name');

        Products::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'brand_id' => $brand_id,
            'brand_name' => $brand_name
        ]);

        Brands::where('id', $brand_id)->increment('product_count', 1);

        return redirect()->route('all-products')->with( 'message', 'Product Added Successfully!' );

    }

    public function EditProduct ($id) {
        $product_info = Products::findOrFail($id);

        return view ('admin.products.edit-product', compact('product_info'));
    }

    public function UpdateProduct (Request $request) {
        $request->validate([
            'product_name' => 'required|unique:products',

        ]);

        $product_id = $request->product_id;

        Products::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name))
        ]);

        return redirect()->route('all-products')->with( 'message', 'Product Updated Successfully!' );

    }

    public function DeleteProduct ($id) {
        $brand_id = Products::where('id', $id)->value('brand_id');
        Products::findOrFail($id)->delete();
        Brands::where('id', $brand_id)->decrement('product_count', 1);

        return redirect()->route('all-products')->with( 'message', 'Product Deleted Successfully!' );
    }







}
