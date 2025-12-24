<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function search(Request $request)
    {

        $cityName= $request->get("city");

        Artisan::call("weather-get-real" , ['city'=>$cityName]);

        $city = CitiesModel::with("todayForecasts")->firstWhere("name","like","%$cityName%");

        if($city === null){

           return redirect()->back()->with("error" ,"Nismo pronasli gradove koji ima odgovarajuce kriterijume");
        }

          $userFavourites=[];
         if(Auth::check()){
             $userFavourites=Auth::user()->userFavourites;
             $userFavourites=$userFavourites->pluck('city_id')->toArray();
             }



        return view("forecast",compact("city"));
    }
}
