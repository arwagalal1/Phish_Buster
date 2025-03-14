<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $email = Session::get('email');
        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Clear the password reset record
        DB::table('password_resets')->where('email', $email)->delete();

        // Clear the session
        Session::forget(['email']);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}