<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        return view("forecast",compact('city'));
    }
}
