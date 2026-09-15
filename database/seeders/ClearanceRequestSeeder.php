<?php

namespace Database\Seeders;

use App\Models\ClearanceRequest;
use App\Models\Department;
use App\Models\Hostel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClearanceRequestSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();
        $hostels = Hostel::all();

        if ($departments->isEmpty()) {
            $this->command?->warn('No departments found — seed departments before running this.');
            return;
        }

        // Ensure we have some student users to attach requests to.
        // Creates a batch of fake students if none exist yet, rather than
        // silently doing nothing.
        $students = User::where('role', 'student')->get();

        if ($students->isEmpty()) {
            $students = User::factory()
                ->count(20)
                ->create([
                    'role' => 'student',
                    'unit_id' => null,
                ]);
        }

        foreach ($students as $student) {
            // Skip if this student already has a clearance request, so the
            // seeder is safe to re-run without piling up duplicates.
            if (ClearanceRequest::where('user_id', $student->id)->exists()) {
                continue;
            }

            $department = $departments->random();
            $hostel = $hostels->isNotEmpty() ? $hostels->random() : null;
            $graduationYear = (string) fake()->numberBetween(2023, 2026);

            ClearanceRequest::create([
                'name' => "fake " .trim("{$student->first_name} {$student->last_name}"),
                'email' => $student->email,
                'phone' => fake()->numerify('080########'),
                'graduation_year' => $graduationYear,
                'address' => fake()->address(),
                'course' => $department->name ?? fake()->jobTitle(),
                'department_id' => $department->id,
                'status' => fake()->numberBetween(0, 2), // adjust range to match your ClearanceStatus enum's backing values
                'required_units_count' => fake()->numberBetween(3, 6),
                'hall' => $hostel?->name,
                'block' => $hostel ? fake()->randomElement(['A', 'B', 'C', 'D']) : null,
                'room_number' => $hostel ? fake()->numberBetween(1, 40) : null,
                'bed_space' => $hostel ? fake()->randomElement(['1', '2', '3', '4']) : null,
                'library_reg_status' => fake()->boolean(70),
                'means_of_identification' => 'seed/means_of_identification/' . Str::uuid() . '.jpg',
                'clearance_receipt' => 'seed/clearance_receipt/' . Str::uuid() . '.jpg',
                'matric_no' => strtoupper(fake()->bothify('???/##/####')),
                'user_id' => $student->id,
                'library_receipt' => fake()->boolean(70) ? 'seed/library_receipt/' . Str::uuid() . '.jpg' : null,
                'library_card' => fake()->boolean(30) ? 'seed/library_card/' . Str::uuid() . '.jpg' : null,
                'library_reg_number' => fake()->boolean(70) ? strtoupper(fake()->bothify('LIB/##/####')) : null,
                'hostel_id' => $hostel?->id,
            ]);
        }
    }
}
