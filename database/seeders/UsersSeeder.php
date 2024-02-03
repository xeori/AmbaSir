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
            "name"=> "admin",
            "email"=> "admin@gmail.com",
            "password"=> Hash::make("admin56"),
            "role"=> "admin"
            ],
            [
                "name"=> "pengguna",
            "email"=> "pengguna@gmail.com",
            "password"=> Hash::make("pengguna56"),
            "role"=> "pengguna"
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
}
    }
}
