<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'Library',                     'type' => 'library'],
            ['name' => 'Hostel',                      'type' => 'hostel'],
            ['name' => 'Division of Student Affairs', 'type' => 'dsa'],
            ['name' => 'Senate',                      'type' => 'senate'],
        ];

        foreach ($units as $unit) {
            Unit::create([
                'name' => $unit['name'],
                'slug' => Str::slug($unit['name']),
                'type' => $unit['type'],
            ]);
        }

    }
}
