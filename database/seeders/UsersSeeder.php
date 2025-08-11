<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


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
        }

        $password=$this->command->getOutput()->ask("Koju lozinku zelite da regitrujete?");

        if ($password === null) {
            $this->command->getOutput()->error("Niste uneli lozinku");
        }

        $username=$this->command->getOutput()->ask("Koje korisnicko ime zelite da registrujete");

        if ($username === null) {
            $this->command->getOutput()->error("Niste uneli korisnicko ime");
        }
        $user= User::where(['email',$email])->first();
        dd($user);

        User::create([
            'email'=>$email,
            'password'=>Hash::make($password),
            'name'=>$username

        ]);
        $this->command->getOutput()->info("Registrovali ste korisnika sa email adresom $email");

}}
