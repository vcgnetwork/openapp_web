<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    //
    public function index()
    {
        // if logged in then
        return view('pages.dashboard');
        // else
        // return view('users.register');
    }

}
