<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('zipcode');
            $table->string('country');
            $table->string('lat');
            $table->string('long');
            $table->string('wuiurl');
            $table->string('city');
            $table->string('state');
            $table->string('observation_time');
            $table->string('weather');
            $table->string('temperature_string');
            $table->string('wind_string');
            $table->string('icon_url');
            $table->string('forecast');
            $table->unique(['user_id', 'zipcode']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
