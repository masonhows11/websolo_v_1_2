<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\CheckValidateEmail;
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
            'code' => ['required' ,'min:6']
        ], $messages = [
            'code.required' => 'کد فعال سازی الزامی است.',
            'code.min' => 'کد فعال سازی معتبر نمی باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.unique' => 'ایمیل تکراری است.',
            'email.emails' => 'ایمیل معتبر نیست.',
        ]);

        try {
            $is_validate = CheckValidateEmail::validateCode($request->email, $request->code);
            if ($is_validate == true) {
                session()->flash('success', 'حساب کاربری شما با موفقیت فعال شد.');
                return redirect()->route('login.form');
            }
            session()->flash('error', 'کد فعال سازی معتبر نمی باشد.');
            return redirect()->back();
        } catch (\Exception $ex) {
            return view('errors_custom.login_error');
        }
    }


}
