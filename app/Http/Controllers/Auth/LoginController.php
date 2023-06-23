<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth_front.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'emails' => ['required', 'email',],
            'password' => ['required', 'min:6', 'max:30']
        ], $messages = [
            'emails.required' => 'ایمیل الزامی است.',
            'emails.emails' => 'ایمیل معتبر نیست.',

            'password.required' => 'رمز عبور الزامی است.',
            'password.min' => 'حداقل ۶ کاراکتر.',
            'password.max' => 'جداکثر ۳۰ کاراکتر.',
        ]);
        try {
            $user = User::where('emails', $request->email)->first();
            if ($user && $user->email_verified_at == null) {
                $code = Str::random();
                $user->code = $code;
                $user->save();
                $encrypted = Crypt::encryptString($code);
                RegisterUserEvent::dispatch($user, $encrypted);
                session()->flash('success', 'ایمیل فعال سازی با موفقبت ارسال شد');
                session()->put('newEmail', $user->email);
                return redirect()->route('emails.verify.prompt');
            }
            if (!$user) {
                return redirect()->back()->with('error', 'کاربری با مشخصات وارد شده وجود ندارد');
            }
            if (Auth::attempt(['emails' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('error', 'نام کاربری با رمز عبور صحیح نمی باشد');
            }
        } catch (\Exception $ex) {
            return view('errors_custom.general_error');

        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
