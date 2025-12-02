<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class ShopingCartController extends Controller
{

    public function showCart()
    {
        $cartItems = Session::get('products');

        $combined = [];
        foreach($cartItems as $cartItem){
            $product = ProductModel::firstWhere("id", $cartItem["product_id"]);
            if($product != null){
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $cartItem["amount"],
                    'price' => $product->price,
                    'total' => $product->price * $cartItem["amount"],
                ];
            }
        }

        return view("cart", compact("combined"));
    }


    public function addToCart(CartAddRequest $request)
    {
        $product = ProductModel::where(['id' => $request->id])->first();
        if ($product->amount < $request->amount) {
            return redirect()->back();
        }

        Session::push('products', [
            'product_id' => $request->id,
            'amount' => $request->amount
        ]);

        return redirect()->route("cart.show");
    }
}
