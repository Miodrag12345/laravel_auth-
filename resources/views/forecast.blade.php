@isset($city)
@foreach($city->forecasts as $prognoza)
    <p>Svice u: {{$sunrise}}</p>
    <p>Zalazi u: {{$sunset}}</p>
    <p>Datum:{{$prognoza->forecast_date}}-Temperatura{{$prognoza->temperature}}</p>
@endforeach
@endisset
