<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class ShopingCartController extends Controller
{
    public function addToCart(CartAddRequest $request)
    {
        Session::put('product', [
            $request->id => $request->amount
        ]);

        return redirect()->route("cart.show");
    }

    public function showCart()
    {
        $products = Session::get("product");
        return view('cart', compact('products'));
    }
}
