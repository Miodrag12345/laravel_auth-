@extends("layout")

@section("content")

    @foreach($userFavourites as $userFavourite)
        <p class="text-white">{{$userFavourite->city->name}}{{$userFavourite->city->todaysForecast->temperature}}</p>;
    @endforeach

    <div class="d-flex justify-content-center align-items-center vh-100 bg-dark text-center text-white">
        <div style="width: 100%; max-width: 400px;">
            <div class="mb-4">
                <h1 class="h3 font-weight-bold">
                    <i class="fas fa-home mr-2"></i> Pronađi svoj grad
                </h1>

                @if (\Illuminate\Support\Facades\Session::has("error"))
                    <p class="text-danger">{{\Illuminate\Support\Facades\Session::get("error")}}</p>
                @endif
            </div>

            <form method="GET" action="{{ route('weather.search') }}">
                <div class="form-group mb-3">
                    <input
                        type="text"
                        name="city"
                        class="form-control form-control-lg text-center rounded"
                        placeholder="Unesite ime grada"
                    >
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="fas fa-search mr-1"></i> Pronađi
                </button>
            </form>
        </div>
    </div>

@endsection
