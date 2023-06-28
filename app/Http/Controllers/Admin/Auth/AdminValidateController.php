<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\CheckExpireToken;
use App\Services\GenerateToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminValidateController extends Controller
{
    //

    public function validateMobileForm()
    {
        return view('admin.auth_admin.validate');
    }

    public function validateMobile(Request $request)
    {

        $request->validate([
            'email' => ['required', 'exists:admins'],
            'code' => ['required', 'digits:6']
        ], $messages = [
            'email.exists' => 'کاربری با ایمیل وارد شده وجود ندارد',
            'email.required' => 'ایمیل خود را وارد کنید',

            'code.required' => 'کد فعال سازی را وارد کنید',
            'code.digits' => 'کد فعال سازی  معتبر نمی باشد',
        ]);

        $validated = CheckExpireToken::checkAdminToken($request->code, $request->email);
        if ($validated == false) {
            session()->flash('error', 'کد فعال سازی معتبر نمی باشد');
            return redirect()->route('admin.login.form');
        }
        if ($admin = Admin::where(['email' => $request->email, 'code' => $request->code])->first()) {
            Auth::guard('admin')->login($admin, $request->remember);
            session()->flash('success', 'ورود موفقیت آمیز بود.');
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login.form');
    }

    public function resendCode(Request $request)
    {

        try {
            $admin = Admin::where('mobile', $request->number)->first();
            $token = GenerateToken::generateToken();
            $admin->code = $token;
            $admin->save();
            // for send code
            //  $admin->notify(new AdminAuthNotification($admin));
            return response()->json(['message' => 'کد فعال سازی مجددا ارسال شد.', 'status' => 200], 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage(), 'status' => 500], 500);
        }
    }

}
