<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class ShopingCartController extends Controller
{
    public function addToCart(CartAddRequest $request)
    {
        $product = ProductModel::where(['id' => $request->id])->first();
        if($product->amount < $request->amount)
        {
            return redirect()->back();
        }

        Session::push('products', [
            'product_id' => $request->id,
            'amount' => $request->amount
        ]);

        return redirect()->route("cart.show");
    }

    public function showCart()
    {
        $allProducts = [];

        foreach (Session::get("products") as $product) {
            array_push($allProducts, $product["product_id"]);
        }

        $products = ProductModel::whereIn('id', $allProducts)->get();

        return view('cart', compact('products'));
    }
}
