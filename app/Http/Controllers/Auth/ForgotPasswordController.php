<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Notifications\VerifyCodeNotification;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Generate a random verification code
        $code = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10); // Code expires in 10 minutes

        // Store the code and expiration in the `password_resets` table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => bcrypt($code),
                'verification_code' => $code,
                'expires_at' => $expiresAt,
                'created_at' => Carbon::now(),
            ]
        );

        // Send the code to the email using Notification
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->notify(new VerifyCodeNotification($code));
        }

        // Store email in session
        Session::put('email', $request->email);

        return redirect()->route('verify.code')->with('success', 'Verification code sent to your email.');
    }
}