<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::all();
            return view('admin.users', ['users' => $users]);
        } catch (\Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error fetching users');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'username' => 'string|max:255|unique:users',
                'email' => 'string|email|max:255|unique:users',
                'password' => 'string|min:8',
                'active' => 'nullable|boolean',
            ]);

            $user = new User();
            $user->name = $validatedData['name'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']);
            $user->active = $request->has('active');
            $user->save();

            return redirect()->route('admin.users')->with('success', 'User added successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error storing user');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.edituser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'email' => 'string|email|max:255|unique:users,email,'.$user->id,
                'password' => 'nullable|string|min:8',
                'active' => 'nullable|boolean',
            ]);

            // Update the user's data
            $user->update($validatedData);

            // Redirect back with success message
            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error updating user: ' . $e->getMessage());
            
            // Redirect back with error message
            return redirect()->back()->with('error', 'Error updating user');
        }
    }
}
