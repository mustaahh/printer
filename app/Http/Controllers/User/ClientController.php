<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage () {
        return view ('user_template.category');
    }
    
    public function SingleProduct () {
        return view('user_template.product');
    }

    public function AddToCart () {
        return view('user_template.add-to-cart');
    }

    public function Checkout () {
        return view('user_template.checkout');
    }

    public function UserProfile () {
        return view('user_template.user-profile');
    }

}
