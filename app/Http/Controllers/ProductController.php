<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = ProductModel::all();

        return view('admin.allProducts', compact('products'));
    }
}
