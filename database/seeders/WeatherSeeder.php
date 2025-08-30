<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    public function run(): void
    {
        $cities = CitiesModel::all(); // izvlacimo sve gradove iz baze prvi korak
        foreach ($cities as $city) {
            $userWeather = WeatherModel::where(['city_id' => $city->id])->first(); //nadji mi prvi city grad sa tim imenom
            if ($userWeather !== null) {
                $this->command->getOutput()->error("Ovaj grad vec postoji");
                continue;}

                WeatherModel::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15, 30)
                ]);
            }
        }
    }




