<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use App\Models\User;
class CheckValidateEmail
{


    public static function validateCode($email,$code)
    {
        $status = null;
        try {
            $user = User::where(['code'=>$code,'email'=>$email])->first();
            if ($user){
                $expired = Carbon::parse($user->updated_at)->addMinutes(3)->isPast();
                if($expired == 1 ){
                    return $status = 0;
                }
                $user->email_verified_at = Date::now();
                $user->save();
                return $status = 1;
            }
            return $status = 2;
        }catch (\Exception $ex){
            return view('errors_custom.validation_error',['error'=>$ex->getMessage()]);
        }
    }

}
