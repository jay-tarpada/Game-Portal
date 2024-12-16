<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Store contact form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());
        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    // Display messages to the admin
    public function index()
    {
        $messages = Contact::all();
        return view('contacts.index', compact('messages'));
    }
}
