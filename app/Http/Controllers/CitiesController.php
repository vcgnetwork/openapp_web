<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        dd('INDEX');
        //$cities = City::all();
        //return view('cities.index')->with('cities', $cities);
    }

    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();
            return [
                'response' => 'success',
                'message' => 'YEAH!'
            ];
        }
        catch (\Exception $e) {
            return [
                'response' => 'error',
                'message' => $e->getMessage()
            ];
        }

    }

}
