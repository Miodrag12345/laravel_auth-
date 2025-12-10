@extends("layout")

@section("content")

<div class="d-flex flex-wrap container mt-5">
  @if(\Illuminate\Support\Facades\Session::has('error'))
      <p class="text-danger fw-bold col-12">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
      <a class="btn btn-primary " href="/login">Ulogujte se </a>

  @endif

    @foreach($cities as $city)

        @php

        $icon=\App\Http\ForecastHelper::getIconByWeatherType($city->todayForecast->weather_type) // izvuci mi danasnju prognozu iz city modela i weather type koji je tuip vremena

        @endphp

        <p>
            @if (in_array($city->id, $userFavourites))
                <a class=" btn-btn primary" href="{{route("city.unfavoutite")}}"><i class="fa-regular  text-white fa-heart"></i></a>
                <a class="btn-btn-primary text-white me-2" href="{{route("forecast.permalink",['city' =>$city->name])}}">
                    <i class="fa-solid {{$icon}}"></i>{{$city->name}}
                </a>
            @else
              <a class=" btn-btn primary" href="{{route("city.favoutite")}}"><i class="fa-regular  text-white fa-heart"></i></a>
              <a class="btn-btn-primary text-white me-2" href="{{route("forecast.permalink",['city' =>$city->name])}}">
                  <i class="fa-solid {{$icon}}"></i>{{$city->name}}
              </a>
            @endif
            <a class=" btn-btn primary" href="{{route("city.favoutite")}}"><i class="fa-regular  text-white fa-heart"></i></a>
            <a class="btn-btn-primary text-white me-2" href="{{route("forecast.permalink",['city' =>$city->name])}}">
               <i class="fa-solid {{$icon}}"></i>{{$city->name}}
            </a></p>

    @endforeach

</div>




