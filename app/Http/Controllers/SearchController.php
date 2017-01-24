<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $api = 'http://api.wunderground.com/api/6a3a9e294f050d5d';

    public function search(Request $request)
    {
        try {
            $data = json_decode(file_get_contents($this->api . '/geolookup/q/' . $request->search_value . '.json'), true);
            if (isset($data['response']['error'])) {
                throw new \Exception('Not Found: ', 1);
            }
            $city = new City;
            $city->user_id = 1;
            //geolookup
            $city->zipcode = $data['location']['zip'];
            $city->city = str_replace(' ', '_', $data['location']['city']);
            $city->state = $data['location']['state'];
            $city->country = $data['location']['country'];
            $city->lat = $data['location']['lat'];
            $city->long = $data['location']['lon'];
            $city->wuiurl = $data['location']['wuiurl'];
            //conditions
            $data = json_decode(file_get_contents($this->api . '/conditions/q/' . $city->state . '/' . $city->city . '.json'), true);
            $city->observation_time = $data['current_observation']['observation_time'];
            $city->weather = $data['current_observation']['weather'];
            $city->temperature_string = $data['current_observation']['temperature_string'];
            $city->wind_string = $data['current_observation']['wind_string'];
            $city->icon_url = $data['current_observation']['icon_url'];
            //forecast
            $data = json_decode(file_get_contents($this->api . '/forecast/q/' . $city->state . '/' . $city->city . '.json'), true);
            $city->forecast = $data['forecast']['txt_forecast']['forecastday'][0]['fcttext'];
            //save
            $city->save();
            $cities = City::all();
            return view('pages.dashboard')
                ->with('cities', $cities)
                ->with('message', $city->city . ' was added using zipcode ' . $city->zipcode)
                ->with('alert', 'success');
        } catch (\Exception $e) {
            $cities = City::all();
            return redirect('/')
                ->with('cities', $cities)
                ->with('message', $e->getMessage())
                ->with('alert', 'danger');
        }

    }

}
