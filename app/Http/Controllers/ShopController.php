<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = [
            "Iphone X", "Samsung A30", "Samsung A52s", "Iphone 16 pro",
        ];

        return view('shop', compact('products'));
    }
}
