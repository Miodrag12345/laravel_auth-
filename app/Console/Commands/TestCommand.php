<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
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
        die("r");
        $city=$this->argument('city');

        $dbCity=CitiesModel::where(['name' => $city])->first(); // stavimo zelimo samo jedan
       if($dbCity===null){
           $dbCity=CitiesModel::create(['name'=>$city]);
       }


        $response=Http::get(env("WEATHER_API_URL")."v1/forecast.json" , [
            'key' => env("WEATHER_API_KEY"),
            'q'   => $city,
            'aqi' => 'no',
            'days'=>'1'
        ]);

        dd($response->json());

        $jsonResponse = $response->json();



     if(isset($jsonResponse['eror'])){
         $this->output->error($jsonResponse['eror']['message']);
     }

     if($dbCity->todayForecasts !== null){
         $this->output->comment("Command finished");
         return;
     }

     $forecastDate=$jsonResponse["forecast"]["forecastday"][0]["date"] ;
     $temperature=$jsonResponse["forecast"]["forecastday"][0]["day"]["avgtemp_c"];
     $weatherType=$jsonResponse["forecast"]["forecastday"][0]["condition"]["text"];
     $probability=$jsonResponse["forecast"]["forecastday"][0]["daily_of_chance_of_rain"];
     dd($forecastDate,$temperature,$weatherType,$probability);




     $forecast= [
         "city_id"=>$dbCity->id,
         "temperature"=>$temperature ,
        "forecast date"=> $forecastDate,
         "weather type"=>strtolower($weatherType),
         "probability"=>$probability
     ];

     ForecastModel::create($forecast);
     $this->output->comment("Added new forecast");



    }
}
