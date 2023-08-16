<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dataGroup = [
            [
                'name' => 'Muhammad Farhan Al-Ghifari',
                'nim' => 'C030320069',
            ],
            [
                'name' => 'Muhammad Farhan Al-Ghifari',
                'nim' => 'C030320017',
            ],
            [
                'name' => 'Muhammad Rizaldy Fauzan',
                'nim' => 'C030320070',
            ],
            [
                'name' => 'Muhammad Rayhan AL-Faruq',
                'nim' => 'C030320056',
            ],
            [
                'name' => 'Muhammad Nazwan Arrazwa',
                'nim' => 'C030320073',
            ],
        ];
        foreach ($dataGroup as $group) {
            Student::create([
                'name' => $group['name'],
                'nim' => $group['nim'],
                'ttl' => fake()->date(),
                'alamat' => fake()->address()
            ]);
        }
    }
}
