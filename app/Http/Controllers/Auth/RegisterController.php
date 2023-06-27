<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('auth_front.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' =>
                ['required', 'unique:users', 'min:4', 'max:20'],
            'email' =>
                ['required', 'unique:users', 'email'],
            'password' =>
                ['required', 'confirmed' ,'max:20',Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ], $messages = [
            'name.required' => 'نام کاربری الزامی است.',
            'name.unique' => 'نام کاربری تکراری است.',
            'name.min' => 'حداقل ۴ کاراکتر باشد.',
            'name.max' => 'حداکثر ۲۰ کاراکتر باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.unique' => 'ایمیل تکراری است.',
            'email.emails' => 'ایمیل معتبر نیست.',

            'password.required' => 'رمز عبور الزامی است.',
            'password.min' => 'حداقل ۸ کاراکتر.',
            'password.max' => 'جداکثر ۲۰ کاراکتر.',
            'password.confirmed' => 'رمز عبور و تکرار آن یکسان نیستند.',
            'password.password' => 'رمز عبور شامل حداقل یک حرف  بزرگ و یک حرف کوچک ، اعداد ، نماد مثل * / . ',
        ]);
        try {
            $code = Str::random(6);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'code' => $code
            ]);
            RegisterUserEvent::dispatch($user,$code);
            session()->flash('success','ایمیل فعال سازی با موفقبت ارسال شد.');
            return redirect()->route('verify.email');
        } catch (\Exception $ex) {
            return view('errors_custom.register_error',['error'=>$ex->getMessage()]);
        }
    }
}
