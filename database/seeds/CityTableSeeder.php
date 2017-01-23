<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'user_id' => 1,
            'zipcode' => '33544',
            'country' => 'US',
            'lat' => '28.18000031',
            'long' => '-82.36000061',
            'wuiurl' => 'https://www.wunderground.com/US/FL/Wesley_Chapel.html',
            'city' => 'Wesley_Chapel',
            'state' => 'FL',
            'observation_time' => 'Last Updated on January 23, 10:59 AM EST',
            'weather' => 'Rain',
            'temperature_string' => '66.1 F (18.9 C)',
            'wind_string' => 'From the West at 11.0 MPH',
            'icon_url' => 'http://icons.wxug.com/i/c/k/rain.gif',
            'forecast' => 'Windy with a few showers early then partly cloudy for the afternoon. High 68F. Winds WNW at 20 to 30 mph. Chance of rain 30%. Winds could occasionally gust over 40 mph.',
            'created_at' => '2017-01-01 00:00:00'
        ]);
        DB::table('cities')->insert([
            'user_id' => 1,
            'zipcode' => '34275',
            'country' => 'US',
            'lat' => '27.13999939',
            'long' => '-82.44999695',
            'wuiurl' => 'https://www.wunderground.com/US/FL/Nokomis.html',
            'city' => 'Nokomis',
            'state' => 'FL',
            'observation_time' => 'Last Updated on January 23, 11:49 AM EST',
            'weather' => 'Calm',
            'temperature_string' => '69.0 F (20.6 C)',
            'wind_string' => 'From the West at 11.0 MPH',
            'icon_url' => 'http://icons.wxug.com/i/c/k/cloudy.gif',
            'forecast' => 'Decreasing cloudiness and windy. Slight chance of a rain shower. High 71F. Winds WNW at 25 to 35 mph.',
            'created_at' => '2017-01-01 00:00:00'
        ]);
        DB::table('cities')->insert([
            'user_id' => 1,
            'zipcode' => '90210',
            'country' => 'US',
            'lat' => '34.09999847',
            'long' => '-118.41000366',
            'wuiurl' => 'https://www.wunderground.com/US/CA/Beverly_Hills.html',
            'city' => 'Beverly_Hills',
            'state' => 'CA',
            'observation_time' => 'Last Updated on January 23, 8:45 AM PST',
            'weather' => 'Overcast',
            'temperature_string' => '51.2 F (10.7 C)',
            'wind_string' => 'From the NE at 1.0 MPH Gusting to 7.0 MPH',
            'icon_url' => 'http://icons.wxug.com/i/c/k/cloudy.gif',
            'forecast' => 'Showers this morning then scattered thunderstorms developing during the afternoon hours. High 54F. Winds W at 10 to 20 mph. Chance of rain 50%.',
            'created_at' => '2017-01-01 00:00:00'
        ]);
        DB::table('cities')->insert([
            'user_id' => 1,
            'zipcode' => '10001',
            'country' => 'US',
            'lat' => '40.75000000',
            'long' => '-74.00000000',
            'wuiurl' => 'https://www.wunderground.com/US/NY/New_York.html',
            'city' => 'New_York',
            'state' => 'NY',
            'observation_time' => 'Last Updated on January 23, 11:46 AM EST',
            'weather' => 'Overcast',
            'temperature_string' => '39.4 F (4.1 C)',
            'wind_string' => 'From the West at 1.8 MPH Gusting to 2.5 MPH',
            'icon_url' => 'http://icons.wxug.com/i/c/k/cloudy.gif',
            'forecast' => 'Showers early, becoming a steady rain for the afternoon. Windy. High around 40F. Winds NE at 25 to 35 mph. Chance of rain 90%. Winds could occasionally gust over 50 mph.',
            'created_at' => '2017-01-01 00:00:00'
        ]);
        
    }
}
