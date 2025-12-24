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
        if(in_array($type,self::WEATHER_ICONS))
        $icon=self::WEATHER_ICONS[$type];
        {
            return  self::WEATHER_ICONS[$type];
        }
        return "fa-sun";
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





