@extends("admin.layout")

@section("content")


<form method="POST" action="{{ route("forecast.create") }}" class="d-flex">
    <h2>Kreiranje novog forecasta</h2>
    @csrf
    <div class="mb-3" class="form-select">
        <select name="city_id">
            @foreach(\App\Models\CitiesModel::all() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <input class="form-contol" type="text"  name="temperature" placeholder="Unesite temperaturu">
    </div>
    <div class="mb-3">
        <select name="weather_type" class="form-select">

            @foreach(\App\Models\ForecastModel::WEATHERS as $weather)
                <option>{{$weather}}</option>
            @endforeach
        </select>
    </div>
   <div class="mb-3">
  <input class="form-control" type="text"  name="probability" placeholder="Unesite sansu za padavine ">
   </div>
    <div class="mb-3">
   <input class="form-control" type="date" name="forecast_date" >
    </div>

    <button type="submit">Snimi </button>
</form>
<div class="d-flex flex-wrap" >
    @foreach(\App\Models\CitiesModel::all() as $city)
          <div class="col-md3">
        <p class="mb-1">{{$city->name}}</p>
        <ul class="list-group col-md-3 mb-4">

            <@foreach($city->forecasts as $forecast)

                @php
                    $boja = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                    $ikonica = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);

                @endphp
                <li class ="list-group-item">{{$forecast->forecast_date}} -
                    <i class="fa-solid" {{$ikonica}}></i>
                    <span style="color: {{$boja}};">{{$forecast->temperature}} </span></li>

            @endforeach

        </ul>
          </div>
    @endforeach
</div>
@endsection


