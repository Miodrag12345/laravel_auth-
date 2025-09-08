<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {
       $prognoza=ForecastModel::where(['city_id'=>$city->id])->get(); // pronadji mi sve prognoze koje imaju city id
        return view('forecast',compact('prognoza'));
    }
}
