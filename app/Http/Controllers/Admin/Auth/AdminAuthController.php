<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\GenerateToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminAuthController extends Controller
{
    //

    public function loginAdminForm()
    {
        return view('admin.auth_admin.login');
    }

    public function loginAdmin(Request $request){

        $request->validate([
            'email' => ['required','exists:admins,email'],
            'password' => ['required','max:20',Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ],$messages =[
            'email.required' => 'ایمیل خود را وارد کنید',
            'email.exists' => 'کاربری با ایمیل وارد شده وجود ندارد',

            'password.required' => 'رمز عبور الزامی است.',
            'password.min' => 'حداقل ۸ کاراکتر.',
            'password.max' => 'حداکثر ۲۰ کاراکتر.',
            'password.password' => 'رمز عبور شامل حداقل یک حرف  بزرگ و یک حرف کوچک ، اعداد ، نماد مثل * / . ',

        ]);

        try {
            $code = GenerateToken::generateToken();
            $admin = Admin::where('mobile',$request->mobile)->first();
            $admin->code = $code;
            $admin->save();
            session(['admin_mobile'=>$admin->mobile]);

            // $admin->notify(new AdminAuthNotification($admin));

            session()->flash('success', 'کد فعال سازی به شماره موبایل ارسال شد');
            return redirect()->route('admin.validate.mobile.form');
        }catch (\Exception $ex)
        {
            return $ex->getMessage();
        }
    }

    public function logOut(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->code = null;
        $admin->code_verified_at = null;
        $admin->remember_token = null;
        $admin->save();
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login.form');
    }
}
