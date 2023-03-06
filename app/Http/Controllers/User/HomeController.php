<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Stocks;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index () {
        $best_sellers = Stocks::latest()->skip(0)->take(3)->get();
        $all_stocks = Stocks::latest()->get();
        $brands = Brands::latest()->get();
        return view('user_template.home', compact('all_stocks', 'brands', 'best_sellers'));
    }

    public function Home () {
        return view('welcome');
    }




}
