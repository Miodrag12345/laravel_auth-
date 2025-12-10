<?php

namespace App\Https\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCities;

class UserCitiesController extends Controller
{
    public function  favourite(Request $request,$city)
    {
      $user=Auth::user();


      if($user===null){
          return redirect()->back()->with(['eror'=>'Nece biti ulogovan da bi stavili grad u favourite']);
      }


      UserCities::create([
          'city_id'=>$city, // isto mora biti kao iz putanje
          'user_id'=>$user->id
      ]);
        return redirect()->back();
    }
    public function unfavourite ($city){
        $user=Auth::user();


        if($user===null){
            return redirect()->back()->with(['eror'=>'Nece biti ulogovan da bi stavili grad u favourite']);
        }
        $userFavourite=\App\Models\UserCities::where ([
            "city_id" => "city",
            "user_id" => "user"
        ])->first();
        $userFavourite->delete();
        return redirect()->back();
    }
}
