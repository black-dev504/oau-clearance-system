<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FacultyDepartmentSeeder extends Seeder
{


    public function run(): void
    {

        foreach ($this->facultiesData() as $facultyData) {
            $faculty = $this->createFacultyWithUnit($facultyData);

            foreach ($facultyData['departments'] as $departmentData) {
                $this->createDepartmentWithUnit($departmentData, $faculty);
            }
        }
    }

    protected function createFacultyWithUnit(array $facultyData): Faculty
    {
        $unit = Unit::firstOrCreate(
            ['slug' => Str::slug($facultyData['name'])],
            [
                'name' => $facultyData['name'],
                'order' => 6,
                'type' => 'faculty',
                'status' => 'active',
                'code' => $facultyData['code'],
            ]
        );

        return Faculty::firstOrCreate(
            ['name' => $facultyData['name']],
            [
                'code' => $facultyData['code'],
                'unit_id' => $unit->id,
                'dean' => $facultyData['dean'] ?? null,
            ]
        );
    }

    protected function createDepartmentWithUnit(array $departmentData, Faculty $faculty): Department
    {
        $unit = Unit::firstOrCreate(
            ['slug' => Str::slug($departmentData['name'])],
            [
                'name' => $departmentData['name'],
                'order' =>5,
                'type' => 'department',
                'status' => 'active',
                'code' => $departmentData['code'],
            ]
        );

        return Department::firstOrCreate(
            [
                'name' => $departmentData['name'],
                'faculty_id' => $faculty->id,
            ],
            [
                'unit_id' => $unit->id,
                'hod' => $departmentData['hod'] ?? null,
                'code' => $departmentData['code'],
                'status' => 'active',
            ]
        );
    }

    /**
     * Faculty + department seed data. Add or edit entries here —
     * everything downstream (units, foreign keys) is derived
     * automatically from this list.
     */
    protected function facultiesData(): array
    {
        return [
            [
                'name' => 'Faculty of Science',
                'code' => 'SCI',
                'dean' => 'Prof. Adebayo Ogundele',
                'departments' => [
                    ['name' => 'Computer Science and Engineering', 'code' => 'CSE', 'hod' => 'Dr. Funmilayo Awotunde'],
                    ['name' => 'Mathematics', 'code' => 'MTH', 'hod' => 'Prof. Kunle Adeyemi'],
                    ['name' => 'Physics and Engineering Physics', 'code' => 'PHY', 'hod' => 'Dr. Ifeoma Chukwu'],
                    ['name' => 'Chemistry', 'code' => 'CHM', 'hod' => 'Prof. Bola Fashina'],
                    ['name' => 'Statistics', 'code' => 'STA', 'hod' => 'Dr. Tunde Balogun'],
                ],
            ],
            [
                'name' => 'Faculty of Technology',
                'code' => 'TECH',
                'dean' => 'Prof. Emeka Nwachukwu',
                'departments' => [
                    ['name' => 'Electronic and Electrical Engineering', 'code' => 'EEE', 'hod' => 'Dr. Segun Owolabi'],
                    ['name' => 'Mechanical Engineering', 'code' => 'MEE', 'hod' => 'Prof. Chidi Eze'],
                    ['name' => 'Civil Engineering', 'code' => 'CVE', 'hod' => 'Dr. Yetunde Alabi'],
                    ['name' => 'Chemical Engineering', 'code' => 'CHE', 'hod' => 'Prof. Musa Danladi'],
                ],
            ],
            [
                'name' => 'Faculty of Social Sciences',
                'code' => 'SOSC',
                'dean' => 'Prof. Grace Adeyanju',
                'departments' => [
                    ['name' => 'Economics', 'code' => 'ECO', 'hod' => 'Dr. Ngozi Umeh'],
                    ['name' => 'Political Science', 'code' => 'POL', 'hod' => 'Prof. Aliyu Bello'],
                    ['name' => 'Psychology', 'code' => 'PSY', 'hod' => 'Dr. Ruth Ajayi'],
                    ['name' => 'Sociology and Anthropology', 'code' => 'SOC', 'hod' => 'Prof. Femi Okoro'],
                ],
            ],
            [
                'name' => 'Faculty of Arts',
                'code' => 'ARTS',
                'dean' => 'Prof. Chinwe Nnamdi',
                'departments' => [
                    ['name' => 'English', 'code' => 'ENG', 'hod' => 'Dr. Amaka Obi'],
                    ['name' => 'History and International Studies', 'code' => 'HIS', 'hod' => 'Prof. Dele Ayoade'],
                    ['name' => 'Linguistics and African Languages', 'code' => 'LIN', 'hod' => 'Dr. Bunmi Adeleke'],
                ],
            ],
            [
                'name' => 'Faculty of Law',
                'code' => 'LAW',
                'dean' => 'Prof. Ibrahim Suleiman',
                'departments' => [
                    ['name' => 'Public Law', 'code' => 'PUL', 'hod' => 'Dr. Kemi Fagbenle'],
                    ['name' => 'Private Law', 'code' => 'PRL', 'hod' => 'Prof. Uche Nnaji'],
                ],
            ],
        ];
    }
}
