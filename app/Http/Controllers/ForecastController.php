<?php

namespace App\Http\Controllers;

class ForecastController extends Controller
{
    public function index($city)
    {
        $forecast = [
            "beograd" => [22, 24, 25, 26, 27],
            "sarajevo" => [20, 24, 22, 25, 21]
        ];

        $city = strtolower($city);
        if (!array_key_exists($city, $forecast)) // za kljuc u nizuu da se proveri
        {
            die("Ovaj grad ne postoji");
        }
        dd($forecast[$city]);
    }
}
