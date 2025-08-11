<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;


class UserSeeder extends Seeder
{

    public function run(): void
    {
        $amount = $this->command->ask("Koliko korisnika zelite napraviti", 500); // koliko korisnika zelimo napraviti ova promenjiva pita ako nists ne uneemo defaultna vrednost bice 500
        $password= $this->command->ask("Koju sifru da upisemo",123456);

        $faker = Factory::create();
        $this->command->getOutput()->progressStart($amount); // progres bar do  500 imamo upisa

       for($i=0;$i<$amount;$i++){
         User::create([
             'name'=> $faker->name,
             'email'=> $faker->email,
             'password'=>Hash::make($password)
         ]);
         $this->command->getOutput()->progressAdvance(); // da ga inc za 1

       }
         $this->command->getOutput()->progressFinish();
    }
}
