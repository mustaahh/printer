<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function Index () {
        $pending_orders = Order::where('status', 'pending')->latest()->get();

        return view ('admin.orders.pending-orders', compact('pending_orders'));
    }

    public function OrderConfirmations () {
        return view ('admin.orders.order-confirmations');
    }
}
