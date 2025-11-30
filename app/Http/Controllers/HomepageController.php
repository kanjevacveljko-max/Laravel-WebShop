<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

class HomepageController extends Controller
{
    public function index()
    {
        $trenutnoVreme = date("h:i:s");

        $sat = date("h");

        $lastSixProducts = ProductModel::orderByDesc("id")->take(6)->get();

        return view('welcome', compact('trenutnoVreme', 'sat', 'lastSixProducts'));
    }
}
