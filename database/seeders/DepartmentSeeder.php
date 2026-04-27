<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Faculty;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Faculty of Science' => [
                'Computer Science',
                'Mathematics',
                'Physics',
                'Chemistry',
                'Microbiology',
            ],
            'Faculty of Engineering' => [
                'Mechanical Engineering',
                'Civil Engineering',
                'Electrical Engineering',
                'Chemical Engineering',
            ],
            'Faculty of Arts' => [
                'English',
                'History',
                'Linguistics',
                'Philosophy',
            ],
            'Faculty of Social Sciences' => [
                'Economics',
                'Political Science',
                'Sociology',
                'Geography',
            ],
            'Faculty of Education' => [
                'Educational Management',
                'Guidance and Counselling',
            ],
            'Faculty of Law' => [
                'Law',
            ],
            'Faculty of Technology' => [
                'Architecture',
                'Building',
                'Urban and Regional Planning',
            ],
        ];

        foreach ($departments as $facultyName => $depts) {
            $faculty = Faculty::where('name', $facultyName)->first();

            if ($faculty) {
                foreach ($depts as $dept) {
                    Department::create([
                        'name' => $dept,
                        'faculty_id' => $faculty->id,
                    ]);
                }
            }
        }
    }
}
