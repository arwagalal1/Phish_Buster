<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $interviewStats = $user->interviewStats ?? 'pending';
        $assessmentStats = $user->assessmentStats ?? 'pending';
        return view('profile', compact('user', 'interviewStats', 'assessmentStats'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'gender' => 'required|in:male,female',
        ]);

        $user->update($request->only('name', 'email', 'phone', 'gender'));

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('home')->with('success', 'You have been logged out!');
    }
}