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
        $units = ['Library', 'Hostel', 'Division of Student Affairs', 'Department', 'Faculty', 'Senate'];


        foreach ($units as $unit) {
            Unit::create([
                'name' => $unit,
                'slug' => Str::slug($unit),
            ]);
        }
    }
}
