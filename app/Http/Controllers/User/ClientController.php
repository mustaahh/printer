<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Stocks;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function Search (Request $request) {
        $search = '';
        if ($request->search) {
            $search = $request->search;
        }

        if ($request->search == '') {
            return redirect()->route('home');
        }

        $data = Stocks::where('product_name', 'like', '%'. $search .'%')
                ->orWhere('stock_desc', 'like', '%'. $search .'%')->get();

        return view('user_template.search', compact('data', 'search'));
    }

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

        $stock = Stocks::find($request->stock_id);
        $count = $stock->quantity - $quantity;
        if ($count < 0) {
            return redirect()->back()->with('error', "Stocks Unavailable");
        }
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

    public function GetShippingAddress () {
        return view('user_template.shipping-address');
    }

    public function AddShippingAddress (Request $request) {
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'recipient_name' => $request->recipient_name,
            'recipient_address' => $request->recipient_address,
            'recipient_phone' => $request->recipient_phone,
        ]);
        return redirect('checkout')->with('message', 'Shipping Info Added Successfuly!');
    }

    public function Checkout () {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();
        return view('user_template.checkout', compact('cart_items', 'shipping_address'));
    }

    public function PlaceOrder () {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

        foreach($cart_items as $cart_item){
            Order::insert([
                'user_id' => $user_id,
                'recipient_name' => $shipping_address->recipient_name,
                'recipient_address' => $shipping_address->recipient_address,
                'recipient_phone' => $shipping_address->recipient_phone,
                'product_id' => $cart_item->product_id,
                'quantity' => $cart_item->quantity,
                'total_price' => $cart_item->price,
            ]);

            $data = Stocks::find($cart_item->product_id);
            $data->quantity = $data->quantity - $cart_item->quantity;
            $data->update();

            $id = $cart_item->id;
            Cart::findOrFail($id)->delete();
        }


        ShippingInfo::where('user_id', $user_id)->first()->delete();

        return redirect()->route('pending-orders')->with('message', 'Your Order Has Been Placed Successfully!');
    }

    public function UserProfile () {
        return view('user_template.user_profile.user-profile');
    }

    public function PendingOrders () {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('user_template.user_profile.pending-orders', compact('pending_orders'));
    }

    public function History () {
        $history_order = Order::where('status', '=','success')->orWhere('status', '=', 'reject')->latest()->get();
        return view('user_template.user_profile.history', compact('history_order'));
    }

}
