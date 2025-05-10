<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Interview;

class ServicesController extends Controller
{
    public function index()
    {
        return view('services');
    }

    public function beforeInterview(request$request)
    {        
        $user = $request->user();
        
        $existingInterview = Interview::where('user_id', $user->id)
            ->first();

        if ($existingInterview) {
            abort(403, 'You have already completed this interview. Your answers are under review.');
        }
        
        return view('interview.before-interview');
    }

    public function verificationCode()
    {
        return view('assessment.verification-code');
    }
}