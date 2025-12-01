<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function createContact($request)
    {
        $this->contactModel->create([
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ]);
    }

    public function updateContact($request, $contact)
    {
        $contact->update([
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);
    }
}
