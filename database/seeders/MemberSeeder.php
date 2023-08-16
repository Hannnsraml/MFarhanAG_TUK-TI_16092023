<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) { 
            Member::create([
                'organization_id' => fake()->numberBetween(1,4),
                'student_id' => fake()->numberBetween(1,5),
            ]);
        }
    }
}
