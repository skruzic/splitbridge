<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function send(ContactRequest $request)
    {
        Mail::to('klub@splitbridge.hr')->send(new ContactMail($request->toArray()));

        return redirect()->back()->with('message', 'Hvala na Vašoj poruci. Kontaktirat ćemo vas uskoro!');
    }
}
