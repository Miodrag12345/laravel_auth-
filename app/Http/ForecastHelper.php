<?php

namespace App\Http;
class ForecastHelper

{
    const WEATHER_ICONS=[
        "rainy" => "fa-cloud-rain",
        "sunny" => "fa-sun",
         "snowy"=> "fa-snowflake",
        "cloudy"=> "fa-cloud-sun"
    ];
    public static  function getIconByWeatherType($type)
    {

        $icon=self::WEATHER_ICONS[$type]; // zelim da izvucem na osnovu tipa  ikonice promenjive npr iz rainy vratice nam iz array konstante fa-cloud-rainy
        return $icon;
    }

    public static function getColorByTemperature($temperature)
    {
        $boja;
        if ($temperature <= 0) {
            $boja = "lightblue";
        }elseif ($temperature > 0 && $temperature <= 15) {
            $boja = "blue";
        }elseif ($temperature > 15 && $temperature <= 25) {
            $boja = "green";
        } else {
            $boja = "red";
        }
        return $boja;
    }


}





