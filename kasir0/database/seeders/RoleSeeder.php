<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updatedOrCreate([
            'name' => 'admin',
        ])
        
        (["name"=> "admin"]);
        
        Role::updatedOrCreate([
            'name' => 'pengguna',
        ])
        
        (["name"=> "pengguna"]);

    }
}
