<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Brands;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function Index () {
        $pending_orders = Order::where('status', 'pending')->latest()->get();

        return view ('admin.orders.pending-orders', compact('pending_orders'));
    }

    public function CompletedOrders () {
        $completed_orders = Order::where('status','success')->latest()->get();
        return view ('admin.orders.completed-orders', compact('completed_orders'));
    }

    public function RejectedOrders () {
        $rejected_orders = Order::where('status','reject')->latest()->get();
        return view ('admin.orders.rejected-orders', compact('rejected_orders'));
    }

    // public function PlaceOrder () {
    //     $user_id = Auth::id();
    //     $cart_items = Cart::where('user_id', $user_id)->get();
    //     $shipping_address = ShippingInfo::where('user_id', $user_id)->first();

    //     foreach($cart_items as $cart_item){
    //         Order::insert([
    //             'user_id' => $user_id,
    //             'recipient_name' => $shipping_address->recipient_name,
    //             'recipient_address' => $shipping_address->recipient_address,
    //             'recipient_phone' => $shipping_address->recipient_phone,
    //             'product_id' => $cart_item->product_id,
    //             'quantity' => $cart_item->quantity,
    //             'total_price' => $cart_item->price,
    //         ]);

    //         $id = $cart_item->id;
    //         Cart::findOrFail($id)->delete();


    //     }

    //     ShippingInfo::where('user_id', $user_id)->first()->delete();

    //     return redirect()->route('pending-orders')->with('message', 'Your Order Has Been Placed Successfully!');
    // }

    public function ConfirmStatus (Request $request ) {
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);

        $pending_id = $request->id;

        Order::findOrFail($pending_id)-> update([
            'status' => 'success',
        ]);
        return redirect()->route('admin-pending-orders')->with( 'message', 'Status Updated Successfully!' );

    }

    public function RejectStatus (Request $request ) {
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);

        $pending_id = $request->id;

        Order::findOrFail($pending_id)-> update([
            'status' => 'reject ',
        ]);
        return redirect()->route('admin-pending-orders')->with( 'message', 'Status Updated Successfully!' );

    }


}
