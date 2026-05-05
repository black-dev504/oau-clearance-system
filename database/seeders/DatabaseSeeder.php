<?php

namespace Database\Seeders;

use App\Models\ClearanceRequest;
use App\Models\User;
use Database\Factories\ClearanceRequestFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();
//
//        User::factory()->create([
//            'first_name' => 'Test ',
//            'email' => 'admin@example.com',
//            'password' => Hash::make('password'),
//            'last_name' => 'admin',
//            'role' => 'officer',
//        ]);
//
//        User::factory()->create([
//            'first_name' => 'Test ',
//            'email' => 'student@gmail.com',
//            'password' => Hash::make('password'),
//            'last_name' => 'student',
//            'role' => 'student',
//        ]);

        ClearanceRequest::factory()->create([
            'user_id' => 3

        ]);

        ClearanceRequest::factory()->create([
            'user_id' => 4
        ]);


//
//        $this->call(FacultySeeder::class);
//        $this->call(DepartmentSeeder::class);
//          $this->call(UnitSeeder::class);
    }
}
