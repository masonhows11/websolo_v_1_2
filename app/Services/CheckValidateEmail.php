<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use App\Models\User;
class CheckValidateEmail
{


    public static function validateCode($email,$code)
    {


        try {
            $user = User::where(['code'=>$code,'email'=>$email])->first();
            if ($user){
                $expired = Carbon::parse($user->updated_at)->addMinutes(3)->isPast();
                if($expired == 1 ){
                    return false;
                }
                $user->email_verified_at = Date::now();
                $user->save();
                return true;
            }
            return false;
        }catch (\Exception $ex){
            return view('errors_custom.validation_error',['error'=>$ex->getMessage()]);
        }
    }

}
