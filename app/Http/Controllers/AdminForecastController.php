<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use Illuminate\Http\Request;

class AdminForecastController extends Controller
{
    public function  create (Request $request)
    {
        $request->validate([
            "city_id" => ["required", "exists:cities,id"],
            "temperature" => "required",
            "weather_type" => "required",
            "probability" => "required"
        ]);


        ForecastModel::create($request->all());
    }
}
