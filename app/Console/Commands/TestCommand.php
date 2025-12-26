<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Services\WeatherService;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()

    {

        $city=$this->argument('city');

        $dbCity=CitiesModel::where(['name' => $city])->first(); // stavimo zelimo samo jedan
       if($dbCity===null){
           $dbCity=CitiesModel::create(['name'=>$city]);
       }


       $weatherService= new WeatherService();


        $jsonResponse = $weatherService->getForecast($city);



        if (isset($jsonResponse['error'])){
         $this->output->error($jsonResponse['eror']['message']);
     }

     if($dbCity->todayForecasts !== null){
         $this->output->comment("Command finished");
         return;
     }

        $forecastDay = $jsonResponse["forecast"]["forecastday"][0];

        $forecastDate = $forecastDay["date"];
        $temperature  = $forecastDay["day"]["avgtemp_c"];
        $weatherType  = $forecastDay["day"]["condition"]["text"];
        $probability  = $forecastDay["day"]["daily_chance_of_rain"];

        $forecast = [
            "city_id" => $dbCity->id,
            "temperature" => $temperature,
            "forecast_date" => $forecastDate,
            "weather_type" => strtolower($weatherType),
            "probability" => $probability
        ];

        ForecastModel::create($forecast);
     $this->output->comment("Added new forecast");



    }
}
