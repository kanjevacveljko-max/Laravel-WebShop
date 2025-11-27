<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Transport\NativeTransportFactory;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $contacts = ContactModel::all();

        return view('admin.allContacts', compact('contacts'));
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

    public function deleteContact($contact)
    {
        $contact = ContactModel::where(["id" => $contact])->first();

        if($contact === null)
        {
            die("Contact ne postoji!");
        }

        $contact->delete();

        return redirect()->route("contact.all");
    }

    public function editContact($contact)
    {
        $contact = ContactModel::where(['id' => $contact])->first();

        if($contact === null)
        {
            die("Contact ne postoji!");
        }

        return view('admin.editContact', compact('contact'));
    }

    public function updateContact(Request $request, $contact)
    {
        $contact = ContactModel::where(['id' => $contact])->first();

        if($contact === null)
        {
            die("Contact ne postoji!");
        }

        $request->validate([
            "email" => "required|email",
            "subject" => "required|string",
            "message" => "required|string|min:5"
        ]);

        $contact->update([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message"),
        ]);

        return redirect()->route("contact.all");
    }
}
