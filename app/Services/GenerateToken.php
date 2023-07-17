<?php


namespace App\Services;


use App\Models\Admin;

class GenerateToken
{
    public static function generateUserToken()
    {
        $activation_token = mt_rand(111111, 999999);

        if (self::userToken($activation_token)) {

            return mt_rand(111111, 999999);
        }
        return $activation_token;

    }

    public static function generateAdminToken()
    {
        $activation_token = mt_rand(111111, 999999);

        if (self::adminToken($activation_token)) {

            return mt_rand(111111, 999999);
        }
        return $activation_token;

    }

    public static function adminToken($code)
    {
        return Admin::where('code', $code)->exists();
    }

    public static function userToken($code)
    {
        return User::where('code', $code)->exists();
    }
}
