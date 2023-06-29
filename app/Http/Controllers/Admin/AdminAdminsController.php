<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminAdminsController extends Controller
{
    //
    public function index()
    {

        $admin = Admin::all();
        return view('admin.admins.index',['admins'=>$admin]);

    }
}