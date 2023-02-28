<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StocksController extends Controller
{
    public function Index () {
        $stocks = Stocks::latest()->get();
        return view ('admin.stocks.all-stocks', compact('stocks'));
    }

    public function AddStocks () {
        $brands = Brands::latest()->get();
        $products = Products::latest()->get();
        return view ('admin.stocks.add-stocks', compact('brands', 'products'));
    }

    public function StoreStocks (Request $request) {
        $validate = Validator::make($request->all(), [
            'brand_id' => 'required',
            'product_id' => 'required', 
            'price' => 'required',
            'quantity' => 'required',
            'stock_desc' => 'required',
            'stock_img' => 'required|image|mimes:jpeg,png,jpg,gif,sfg|max:2048',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        
        $image = $request->file('stock_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->stock_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;


        $brand_id = $request->brand_id;
        $brand_name = Brands::where('id', $brand_id)->value('brand_name');
        
        $product_id = $request->product_id;
        $product_name = Products::where('id', $product_id)->value('product_name');

        Stocks::insert([
            'brand_id' => $request->brand_id,
            'brand_name' => $brand_name,
            'product_id' => $request->product_id,
            'product_name' => $product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'stock_desc' => $request->stock_desc,
            'stock_img' => $img_url,
        ]);

        Brands::where('id', $brand_id)->increment('stock_count', 1);
        Products::where('id', $product_id)->increment('stock_count', 1);

        return redirect()->route('all-stocks')->with( 'message', 'Stocks Added Successfully!' ); 
    }
    

    public function EditStockImage ($id) {
        $stock_info = Stocks::findOrFail($id);
        return view ('admin.stocks.edit-stock-image', compact('stock_info')) ;
    }

    public function UpdateStockImage (Request $request) {
        $validate = Validator::make($request->all(), [
            'stock_img' => 'required|image|mimes:jpeg,png,jpg,gif,sfg|max:2048',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $id = $request->id;

        $image = $request->file('stock_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->stock_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        Stocks::findOrFail($id)->update([
            'stock_img' => $img_url,
        ]);

        return redirect()->route('all-stocks')->with( 'message', 'Stocks Image Updated Successfully!' ); 
    }

    public function EditStock($id){
        $stock_info = Stocks::findOrFail($id);
        return view ('admin.stocks.edit-stock', compact('stock_info'));
    }

    public function UpdateStock(Request $request){
        $stock_id = $request->id;

        $validate = Validator::make($request->all(), [         
            'price' => 'required',
            'quantity' => 'required',
            'stock_desc' => 'required',
        ]);

        
        Stocks::findOrFail($stock_id)-> update([
            'price' => $request->price,  
            'quantity' => $request->quantity,  
            'stock_desc' => $request->stock_desc,  
        ]);

        return redirect()->route('all-stocks')->with( 'message', 'Stocks Information Updated Successfully!' ); 
    }


    public function DeleteStock ($id) {
        $brand_id = Stocks::where('id', $id)->value('brand_id');
        $product_id = Stocks::where('id', $id)->value('product_id');
        
        Stocks::findOrFail($id)->delete();

        Brands::where('id', $brand_id)->decrement('stock_count', 1);
        Products::where('id', $product_id)->decrement('stock_count', 1);

        return redirect()->route('all-stocks')->with( 'message', 'Stocks Deleted Successfully!' );

    }








}
