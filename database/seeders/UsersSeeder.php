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
        $userData =[
            [
            "name"=> "petinggi",
            "email"=> "petinggi@gmail.com",
            "password"=> Hash::make("petinggi56"),
            "role"=> "pemilik",
            "gambar"=>"images/shesh.jpg",
            ],
           
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
}
    }
}
