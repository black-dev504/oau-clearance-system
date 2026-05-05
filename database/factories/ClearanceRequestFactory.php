<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClearanceRequest>
 */
class ClearanceRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'matric_no' => $this->faker->numerify('MAT-####'),
            'department' => $this->faker->randomElement(['Computer Science', 'Electrical Engineering', 'Mechanical Engineering']),
            'address' => $this->faker->address(),
            'graduation_year' => $this->faker->year(),
            'course' => $this->faker->randomElement(['Computer Science', 'Electrical Engineering', 'Mechanical Engineering']),
            'means_of_identification' => $this->faker->randomElement(['student_id_card', 'national_id_card', 'passport']),
            'clearance_receipt' =>  $this->faker->randomElement(['student_id_card', 'national_id_card', 'passport']),

        ];
    }
}
