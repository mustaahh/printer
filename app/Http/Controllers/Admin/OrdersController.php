<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function Index () {
        return view ('admin.orders.completed-orders');
    }

    public function OrderConfirmations () {
        return view ('admin.orders.order-confirmations');
    }
}
