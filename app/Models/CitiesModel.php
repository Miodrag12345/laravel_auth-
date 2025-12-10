<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = "cities";

    protected $fillable = ["city"];

    public function forecasts()
    {
        return $this->hasMany(ForecastModel::class, "city_id", "id")  // one to Many relacija
        ->orderBy("forecast_date"); // selektovali smo poredjali smo forecast_date od njastarijeg do najnovijeg
    }


    public function todayForecasts()
    {

        return $this->hasOne(ForecastModel::class, 'city_id', 'id')
         ->whereDate("forecast_date" , Carbon::now());

    }
}

