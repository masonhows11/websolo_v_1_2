<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResendEmailVerifyController extends Controller
{
    public function resendEmailPrompt(){

        return view('auth_front.verify_email_prompt');
    }

    public function resendEmail(Request $request){

        return $request;

    }
}
