<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                ['required', 'min:6', 'max:30', 'confirmed']
        ], $messages = [
            'name.required' => 'نام کاربری الزامی است.',
            'name.unique' => 'نام کاربری تکراری است.',
            'name.min' => 'حداقل ۴ کاراکتر باشد.',
            'name.max' => 'حداکثر ۲۰ کاراکتر باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.unique' => 'ایمیل تکراری است.',
            'email.emails' => 'ایمیل معتبر نیست.',

            'password.required' => 'رمز عبور الزامی است.',
            'password.min' => 'حداقل ۶ کاراکتر.',
            'password.max' => 'جداکثر ۳۰ کاراکتر.',
            'password.confirmed' => 'رمز عبور و تکرار آن یکسان نیستند.',
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
            return redirect()->route('verify.email.form');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
