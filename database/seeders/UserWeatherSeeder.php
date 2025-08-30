<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{

    public function run(): void
    {
        $city=$this->command->getOutput()->ask("Unesite ime grada");

        if($city=== null){
            $this->command->getOutput()->error("Niste uneli ime grada");
        }
        $temperature=$this->command->getOutput()->ask("Unesite temperaturu grada");
        if($temperature===null){
            $this->command->getOutput()->error("Niste uneli remperaturu grada");
        }
        WeatherModel::create([
                'city'=>$city,
                'temperature'=>$temperature
            ]

        );
        $this->command->getOutput()->info("Uspesno smo uneli novi grad $city sa temperatutom $temperature");
    }
}
