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
            'price' => 'required|decimal|min:0',
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

    public function deleteProduct($product)
    {
        $singleProduct = ProductModel::where(['id' => $product])->first();

        if($singleProduct === null)
        {
            die("Ovaj proizvod ne postoji.");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function editProduct($product)
    {
        $product = ProductModel::where(['id' => $product])->first();

        if($product === null)
        {
            die("Ovaj proizvod ne postoji.");
        }

        return view('admin.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $product)
    {
        $product = ProductModel::where(['id' => $product])->first();

        if($product === null)
        {
            die("Ovaj proizvod ne postoji.");
        }

        $request->validate([
            'name' => 'required|string|unique:products',
            'description' => 'required|string|min:10',
            'amount' => 'required|integer|min:0',
            'price' => 'required|decimal|min:0',
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
