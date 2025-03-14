<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class VerifyCodeController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify-code');
    }

    public function verify(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        $email = Session::get('email');
        $resetRecord = DB::table('password_resets')->where('email', $email)->first();

        if (!$resetRecord) {
            return back()->withErrors(['code' => 'Invalid or expired verification code.']);
        }

        // Check if the code matches and is not expired
        if ($resetRecord->verification_code != $request->code || Carbon::now()->greaterThan($resetRecord->expires_at)) {
            return back()->withErrors(['code' => 'Invalid or expired verification code.']);
        }

        // Code is valid, redirect to reset password form
        return redirect()->route('password.reset')->with('success', 'Verification successful.');
    }
}