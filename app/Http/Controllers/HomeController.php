<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $data['latests'] = Product::get();
        return view('layouts/client_view/home',$data);
    }

    function admin()
    {
        return view('layouts/admin_view/app');
    }
    function test()
    {
        return view('auth/test');
    }
}
