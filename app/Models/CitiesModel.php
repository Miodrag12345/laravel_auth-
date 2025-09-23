<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = "cities";

    protected $fillable = ["city"];
    public function  forecasts()
    {
       return $this->hasMany(ForecastModel::class, "city_id","id")  // one to Many relacija
        ->orderBy("forecast_date"); // selektovali smo poredjali smo forecast_date od njastarijeg do najnovijeg
    }
}
