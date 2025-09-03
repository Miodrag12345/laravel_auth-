<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    protected $table = "weather";
    protected $fillable = ["city", "temperature"];

    public function city()
    {
      return $this->hasOne(CitiesModel::class, "id", "city_id");// kad se pozove city funkcija da nam vrati tu  1 funckiju
        // ovaj 1 model ima vezu sa cities modelom .Polje unutar id su povezani sa cities modelom  polje id unutar weather modela povezano je sa city_id

    }
}
