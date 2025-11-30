<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

class ShopController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();

        return view('shop', compact('products'));
    }
}
