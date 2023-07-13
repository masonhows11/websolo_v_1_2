<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class CustomersController extends Controller
{
    //
    public function index()
    {
        return view('front.customers.index');
    }
}

