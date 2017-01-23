<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index')->with('cities', $cities);
    }

    public function conditions()
    {
        // http://api.wunderground.com/api/6a3a9e294f050d5d/conditions/q/FL/Wesley_Chapel.json
        //'http://api.wunderground.com/api/6a3a9e294f050d5d/conditions/q/FL/Nokomis.json'

        $data = json_decode(file_get_contents('http://api.wunderground.com/api/6a3a9e294f050d5d/conditions/q/FL/Wesley_Chapel.json'), true );
        //$data = json_decode(file_get_contents("http://api.wunderground.com/api/6a3a9e294f050d5d/forecast/q/FL/Tampa.json"), true );
        //$data = json_decode(file_get_contents("http://api.wunderground.com/api/6a3a9e294f050d5d/geolookup/q/33544.json"), true );
        //dd($data);
        return view('cities.index')->with('data', $data['current_observation']);
    }
    public function forecast()
    {
        // http://api.wunderground.com/api/6a3a9e294f050d5d/forecast/q/FL/Wesley_Chapel.json
    }

    public function zip()
    {
        // http://api.wunderground.com/api/6a3a9e294f050d5d/geolookup/q/33544.json
    }

}
