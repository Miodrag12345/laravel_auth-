<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    public function run(): void
    {
        $prognoza=[
            "Beograd"=>22,
            "Sarajevo"=>24,
            "Novi Sad"=>23,
            "Zagreb"=>26
        ];
        foreach ($prognoza as $city=>$temperature){
            $userWeather=WeatherModel::where(['city'=>$city])->first(); //nadji mi prvi city grad sa tim imenom
            if($userWeather !==null){
                $this->command->getOutput()->error("Ovaj grad vec postoji");
                continue;
            }
            WeatherModel::create([
                'city'=>$city,
                'temperature'=>$temperature
            ]);
        }
    }
}

