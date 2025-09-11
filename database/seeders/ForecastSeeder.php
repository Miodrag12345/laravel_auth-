<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities=CitiesModel::all();
        foreach($cities as $city){
            for($i=0; $i<5; $i++){
                $weatherType= ForecastModel::WEATHERS[rand(0,2)]; // izvadili smo weather type
                $probability=null; // po defaltu
                if($weatherType=="rainy" || $weatherType=="snowy"){
                    $probability=rand(1,100);
                }
                ForecastModel::create([
                    "city_id"=>$city->id,
                    "temperature"=>rand(15,30),
                    "forecast_date"=>Carbon::now()->addDays(rand(1,30)),
                    "weather_type"=>$weatherType,
                    "probability"=>$probability
                ]);
            }
        }
    }
}
