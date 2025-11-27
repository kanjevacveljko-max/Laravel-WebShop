<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $trenutnoVreme = date("h:i:s");
        $sat = date("h");

        return view('welcome', compact('trenutnoVreme', 'sat'));
    }
}
