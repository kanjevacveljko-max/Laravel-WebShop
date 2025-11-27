<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $contacts = ContactModel::all();

        return view('allContacts', compact('contacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "subject" => "required|string",
            "message" => "required|string|min:5"
        ]);

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message"),
        ]);

        return redirect('/shop');
    }
}
