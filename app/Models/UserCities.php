<?php

namespace  App\Http\Controllers\UserCitiesController;
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
   protected $table ="user_cities";
   protected $fillable =["user_id" ,"city_id"];

   public function city()
   {
      return $this->hasOne(CitiesModel::class , 'id','city_id');
   }
}
