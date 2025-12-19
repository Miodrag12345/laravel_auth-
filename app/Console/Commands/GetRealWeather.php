<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather our application using the open API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $url="https://reqres.in/api/users?page=2";
       $response=Http::get($url);
       $jsonResponse=$response->body();
       $jsonResponse->json_decode($jsonResponse,true);
       dd($jsonResponse['data'][0]);

    }
}
