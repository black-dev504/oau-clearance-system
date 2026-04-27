<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        $faculties = [
            ['name' => 'Faculty of Science'],
            ['name' => 'Faculty of Engineering'],
            ['name' => 'Faculty of Arts'],
            ['name' => 'Faculty of Social Sciences'],
            ['name' => 'Faculty of Education'],
            ['name' => 'Faculty of Law'],
            ['name' => 'Faculty of Technology'],
        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}
