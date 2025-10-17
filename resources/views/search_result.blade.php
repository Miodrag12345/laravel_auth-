@extends("layout")

@section("content")

<div class="d-flex flex-wrap container">

    @foreach($cities as $city)

        @php

        $icon=\App\Http\ForecastHelper::getIconByWeatherType($city->todayForecast->weather_type) // izvuci mi danasnju prognozu iz city modela i weather type koji je tuip vremena

        @endphp

        <p> <a class="btn-btn-primary text-white n2" href="{{route("forecast.permalink",['city' =>$city->name])}}">
               <i class="fa-solid {{$icon}}"></i>{{$city->name}}
            </a></p>

    @endforeach

</div>




