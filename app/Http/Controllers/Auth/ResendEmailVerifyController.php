<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResendEmailVerifyController extends Controller
{
    public function resendEmailPrompt()
    {

        return view('front.auth_front.verify_email_prompt');
    }

    public function resendEmail(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],

        ], $messages = [
            'email.required' => 'ایمیل الزامی است.',
            'email.email' => 'ایمیل معتبر نیست.',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            session()->flash('error', 'ایمیل وارد شده وجود ندارد.');
            return redirect()->back();
        }
        try {

            $code = Str::random(6);
            $user->code = $code;
            $user->save();
            RegisterUserEvent::dispatch($user, $code);
            session()->flash('success', 'ایمیل فعال سازی با موفقبت ارسال شد.');
            return redirect()->route('verify.email');

        } catch (\Exception $ex) {
            return view('errors_custom.general_error', ['error' => $ex->getMessage()]);
        }


    }
}
