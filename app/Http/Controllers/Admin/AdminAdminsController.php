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
        $admin = Admin::paginate(10);
        return view('admin.admins.index',['admins'=>$admin]);
    }

    public function delete(Request $request){

     return $request->id;
    }

    public function deactivateAdmin(){

    }
}
