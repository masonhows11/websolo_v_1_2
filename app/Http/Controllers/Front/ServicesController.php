<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class ServicesController extends Controller
{
    //
    public function index()
    {
        return view('front.services.index');
    }
}
