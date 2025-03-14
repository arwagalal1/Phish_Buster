<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact message to the database
        Message::create($request->all());

       // Flash the message explicitly for one request
        Session::flash('success', 'Your message has been sent successfully!');

        return redirect()->route('contact');
    }
}