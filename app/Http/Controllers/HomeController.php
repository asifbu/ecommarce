<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('layouts/client_view/home');
    }

    function admin()
    {
        return view('layouts/admin_view/home');
    }
    function test()
    {
        return view('auth/test');
    }
}
