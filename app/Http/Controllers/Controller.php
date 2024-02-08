<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\SpecialItem;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
   
    public function index()
    {
        $specialItems = SpecialItem::all();
        return view('index', compact('specialItems'));
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save to the database
        $message = ContactMessage::create($request->all());

        // Send email to the owner
        Mail::to('owner@example.com')->send(new \App\Mail\ContactMessage($message));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    public function showContactMessages()
    {
        // Retrieve all messages from the database
        $messages = ContactMessage::all();

        // Pass messages to the view
        return view('admin.messages', compact('messages'));
    }
}
