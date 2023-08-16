<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'KPA-P',
            'PMI',
            'LPM Lensa',
            'Music Generation',
        ];

        foreach ($data as $d) {
            Organization::create(['ukm_name' => $d, 'deskripsi' => fake()->paragraph]);
        }
    }
}
