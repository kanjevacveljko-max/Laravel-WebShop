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

    public function saveProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:products',
            'description' => 'required|string|min:10',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
        ]);

        ProductModel::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
        ]);

        return redirect()->route('product.all');
    }

    public function deleteProduct(ProductModel $product)
    {
        $product->delete();

        return redirect()->back();
    }

    public function editProduct(ProductModel $product)
    {
        return view('admin.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, ProductModel $product)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|min:10',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
        ]);

        $product->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),

        ]);

        return redirect()->route('product.all');
    }
}
