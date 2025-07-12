<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Retrieve user
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email not Found.');
        }

        if (!Hash::check($request->password, $user->password_hash)) {
            return back()->with('error', 'Password Incorrect.');
        }

        Auth::login($user);
        return redirect('/dashboard');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:Male,Female',
            'phone' => 'required|string|max:20',
        ]);

        $user = User::find(Auth::id());


        $user->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');

    }

    public function destroy()
    {
        Auth::logout();              // Logs out the user
        request()->session()->invalidate();    // Invalidate session
        request()->session()->regenerateToken(); // Prevent CSRF reuse

        return redirect('/login');
    }
}
