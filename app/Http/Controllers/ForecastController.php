<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function search(Request $request)
    {
        $cityName= $request->get("city");

        $city = CitiesModel::with("todayForecasts")->firstWhere("name","like","%$cityName%");

        if($city === null){
           return redirect()->back()->with("error" ,"Nismo pronasli gradove koji ima odgovarajuce kriterijume");
        }
        return view("forecast",compact("city"));
    }
}
