<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    //
    public function allMessages()
    {
               // Retrieve all messages from the database
               $messages = ContactMessage::all();

               // Pass messages to the view
               return view('admin.messages', compact('messages'));
       
    }

    public function store(Request $request)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Store message in the database with is_read set to false
    ContactMessage::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
        'is_read' => false,
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Message sent successfully!');
}
public function unreadMessagesCount()
{
    $unreadCount = ContactMessage::where('is_read', false)->count();

    return $unreadCount;
}

}
