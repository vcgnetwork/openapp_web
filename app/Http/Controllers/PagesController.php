<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public $api = 'http://api.wunderground.com/api/6a3a9e294f050d5d';

    //
    public function index()
    {
        $cities = City::all();
        return view('pages.dashboard')->with('cities', $cities);
    }

}
