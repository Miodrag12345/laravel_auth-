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
            $lastTemperature=null;

            for($i=0; $i<30; $i++){
                $weatherType= ForecastModel::WEATHERS[rand(0,3)]; // izvadili smo weather type
                $probability=null; // po defaltu
                if($weatherType=="rainy" || $weatherType=="snowy"){
                    $probability=rand(1,100);
                }

                $temperature=null;

                if($lastTemperature !== null){
                    $minTemperature=$lastTemperature-5;
                    $maxTemperature=$lastTemperature+5;
                    $temperature=rand($minTemperature,$maxTemperature);
                } else {

                switch ($weatherType){
                    case "sunny";
                    $temperature= rand(-50,50);
                    break;
                    case "cloudy";
                    $temperature= rand(-50,15);
                    break;
                    case "rainy";
                    $temperature= rand(-10,50);
                    break;
                    case "snowy";
                    $temperature= rand(-50,1);
                    break;

                }}

                ForecastModel::create([
                    "city_id"=>$city->id,
                    "temperature"=>$temperature,
                    "forecast_date"=>Carbon::now()->addDays($i),
                    "weather_type"=>$weatherType,
                    "probability"=>$probability
                ]);
                $lastTemperature=$temperature; // da je poslednja temperatura grada definisana jednaka trenutnoj temperaturi
            }
        }
    }
}
