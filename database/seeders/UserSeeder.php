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
        $data = [
            'name' => 'Administrator',
            'nim' => 'Admin',
            'ttl' => fake()->date(),
            'alamat' => fake()->address(),
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('12345678'),
        ];

        User::create($data);        
    }
}
