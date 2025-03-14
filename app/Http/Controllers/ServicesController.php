<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('services');
    }

    public function beforeInterview()
    {
        return view('interview.before-interview');
    }

    public function verificationCode()
    {
        return view('assessment.verification-code');
    }
}