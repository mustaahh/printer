<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Stocks;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index () {
        $all_stocks = Stocks::latest()->get();
        $brands = Brands::latest()->get();
        return view('user_template.home', compact('all_stocks', 'brands'));
    }




}
