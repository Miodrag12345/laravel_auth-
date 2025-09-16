<form method="POST" action="{{ route("forecast.create") }}">
    @csrf
    <input type="text"  name="temperature" placeholder="Unesite temperaturu">
    <select name="weather_type">
        @foreach(\App\Models\ForecastModel::WEATHERS as $weather)
          <option>{{$weather}}</option>
        @endforeach
    </select>
  <input type="text"  name="probability" placeholder="Unesite sansu za padavine ">
   <input type="date" name="forecast_date" >
    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
    <button type="submit">Snimi </button>
</form>
@foreach(\App\Models\CitiesModel::all() as $city)
    <h3>{{$city->name}}</h3>
    <ul>
        <@foreach($city->forecasts as $forecast)
             <li>{{$forecast->forecast_date}} - {{$forecast->temperature}}</li>

        @endforeach
    </ul>
@endforeach
