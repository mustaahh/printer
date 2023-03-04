<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Stocks;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function BrandPage ($id) {
        $brands = Brands::findOrFail($id);
        $stocks = Stocks::where('brand_id', $id)->latest()->get();
        return view ('user_template.brand', compact('brands', 'stocks'));
    }
    
    public function SingleProduct ($id) {
        $single_product = Stocks::findOrFail($id);
        return view ('user_template.product', compact('single_product'));
    }

    public function AddToCart () {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('user_template.add-to-cart', compact('cart_items'));
    }

    public function AddProductToCart (Request $request) {

        $product_price = $request->price;
        $quantity = $request->quantity;
        $price_total = $product_price * $quantity;
        Cart::insert([
            'product_id' => $request->stock_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price_total ,
        ]);
        return redirect('add-to-cart')->with('message', 'Item Added To Cart Successfuly!');
    }

    public function RemoveCartItem ($id) {
        Cart::findOrFail($id)->delete();
        return redirect('add-to-cart')->with('message', 'Item Removed From Cart Successfuly!');
    }

    public function Checkout () {
        return view('user_template.checkout');
    }

    public function UserProfile () {
        return view('user_template.user-profile');
    }

    public function PendingOrders () {
        return view('user_template.pending-orders');
    }

    public function History () {
        return view('user_template.history');
    }

}
