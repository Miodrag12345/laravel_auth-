<?php



use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;

use App\Http\Middleware\AdminCheckMiddloeware;
use Illuminate\Support\Facades\Route;





Route::view("/","welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/prognoza/search', [ForecastController::class, 'search'])->name('weather.search');

Route::get("/prognoza",[WeatherController::class, 'index']);

Route::get("/forecast/{city:name}",[ForecastController::class, "index"]);
Route::prefix('/admin')->middleware(AdminCheckMiddloeware::class)->group(function (){
    Route::view("/weather", "admin.weather_index");
    Route::post("/admin/weather/update", [AdminWeatherController::class, 'update'])->name("weather.update");
    Route::view("/forecast", "admin.forecast_index");
    Route::post("/forecast/create",[AdminForecastController::class, 'create'])->name("forecast.create");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


