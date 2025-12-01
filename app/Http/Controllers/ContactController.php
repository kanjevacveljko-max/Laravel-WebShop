<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $contacts = ContactModel::all();
        return view('admin.allContacts', compact('contacts'));
    }

    public function sendContact(SaveContactRequest $request)
    {
        $this->contactRepo->createContact($request);
        return redirect('/shop');
    }

    public function deleteContact(ContactModel $contact)
    {
        $contact->delete();
        return redirect()->route("contact.all");
    }

    public function editContact(ContactModel $contact)
    {
        return view('admin.editContact', compact('contact'));
    }

    public function updateContact(SaveContactRequest $request, ContactModel $contact)
    {
        $this->contactRepo->updateContact($request);
        return redirect()->route("contact.all");
    }
}
