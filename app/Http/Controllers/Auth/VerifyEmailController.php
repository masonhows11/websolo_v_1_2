<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    //
    public function verifyEmail()
    {
        return view('auth_front.verify_email');
    }

    public function verify(){
        
    }
}
