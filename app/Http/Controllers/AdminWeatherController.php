<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

class AdminWeatherController extends Controller
{
    public function  update (Request $request)

    {
      $request->validate ([
          "temperature"=>"required",
          "city_id"=>"required | exists:cities,id"
      ]);
      $weather = WeatherModel::where(['city_id' => $request ->get('city_id')]) ->first(); // uzmi city_id iz requesta  i nadji mi prvi id
      $weather ->temperature = $request ->get("temperature");
      $weather ->save();
      return redirect()->back();


    }
}

