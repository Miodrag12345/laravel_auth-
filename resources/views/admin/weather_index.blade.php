
<form method="POST" action="{{route('weather.update')}}"}>

    @csrf
    <input type="text" name="temperature" placeholder="Unesite temperaturu">

    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>

    <button>Snimi </button>
</form>
<div>
    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p>{{$weather->city->name}} - {{$weather->temperature}}</p>

    @endforeach
</div>
