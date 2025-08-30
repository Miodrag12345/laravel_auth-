<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{
    public function index()
    {
        $prognoza=[
            "Beograd"=>22,
            "Sarajevo"=>24,
            "Novi Sad"=>23,
            "Zagreb"=>26
        ];
        return view("weather", compact ("prognoza")); //ime stranice u get sto smo ubacili nas url
    }
}
