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

    public function verify(Request $request)
    {

        $request->validate([
            'email' => ['required', 'exists:users', 'email'],
            'code' => ['required', 'digits:6']
        ], $messages = [
            'code.required' => 'کد فعال سازی الزامی است',
            'code.digits' => 'کد فعال سازی معتبر نمی باشد',

            'email.required' => 'ایمیل الزامی است.',
            'email.unique' => 'ایمیل تکراری است.',
            'email.emails' => 'ایمیل معتبر نیست.',
        ]);

    }


}
