<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    protected $table = "forecast";
    protected $fillable = ["city_id", "temperature", "forecast_date","weather_type","probability","role"];

    const WEATHERS= ["rainy","sunny","snowy"];




    public function city()
    {
       return $this->hasOne(CitiesModel::class, "id","city_id");
    }

}
