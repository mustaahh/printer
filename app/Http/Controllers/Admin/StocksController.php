<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function Index () {
        return view ('admin.stocks.all-stocks');
    }

    public function AddStocks () {
        $brands = Brands::latest()->get();

        return view ('admin.stocks.add-stocks', compact('brands'));
    }

    



}
