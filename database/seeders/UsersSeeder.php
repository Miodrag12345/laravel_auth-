<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email=$this->command->getOutput()->ask("Koju email zelite da regitrujete?");

        if ($email === null) {
           $this->command->getOutput()->error("Niste uneli email adresu");
           return;
        }

        $password=$this->command->getOutput()->ask("Koju lozinku zelite da regitrujete?");

        if ($password === null) {
            $this->command->getOutput()->error("Niste uneli lozinku");
            return;
        }

        $username=$this->command->getOutput()->ask("Koje korisnicko ime zelite da registrujete");

        if ($username === null) {
            $this->command->getOutput()->error("Niste uneli korisnicko ime");
            return;
        }
        $user= User::where(['email'=>$email])->first();
        if($user instanceof User){
          $this->command->getOutput()->error("Korisnik sa ovom email adresom vec postoji");
          return;
        }

        User::create([
            'email'=>$email,
            'password'=>Hash::make($password),
            'name'=>$username

        ]);
        $this->command->getOutput()->info("Registrovali ste korisnika sa email adresom $email");

}}
