<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;

class WeatherController extends Controller
{
    public function index()
    {
       $prognoza=WeatherModel::all();


        return view("weather", compact("prognoza")); //ime stranice u get sto smo ubacili nas url
    }
}
