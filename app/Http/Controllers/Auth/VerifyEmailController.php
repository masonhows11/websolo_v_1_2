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
        return view('front.auth_front.verify_email');
    }

    public function verify(Request $request)
    {

        $request->validate([
            'email' => ['required', 'exists:users', 'email'],
            'code' => ['required', 'min:6']
        ], $messages = [
            'code.required' => 'کد فعال سازی الزامی است.',
            'code.min' => 'کد فعال سازی معتبر نمی باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.exists' => 'ایمیل وارد شده وجود ندارد.',
            'email.email' => 'ایمیل معتبر نیست.',
        ]);

        try {
            $is_validate = CheckValidateEmail::validateCode($request->email, $request->code);

            switch ($is_validate) {
                case 0 :
                    session()->flash('error', 'کد فعال سازی معتبر نمی باشد.');
                    return redirect()->back();
                    break;
                case 1 :
                    session()->flash('success', 'حساب کاربری شما با موفقیت فعال شد.');
                    return redirect()->route('login.form');
                    break;

                case 2 :
                    session()->flash('error', 'ایمیل وارد شده وجود ندارد.');
                    return redirect()->back();
                    break;

                default:
                    session()->flash('error', 'ایمیل وارد شده وجود ندارد.');
                    return redirect()->back('login.form');
                    break;

            }
        } catch (\Exception $ex) {
            return view('errors_custom.login_error');
        }
    }


}
