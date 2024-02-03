<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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