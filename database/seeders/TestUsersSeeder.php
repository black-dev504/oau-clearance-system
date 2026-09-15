<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TestUsersSeeder extends Seeder
{
    protected array $names = [
        'usman', 'motun', 'marvel', 'ore', 'muideen',
        'emmy', 'bolu', 'faisal', 'toba', 'tiddy',
    ];

    /**
     * These specific people also get an admin account, in addition to
     * their student + 2 officer accounts.
     */
    protected array $adminNames = [
        'toba', 'usman', 'faisal', 'tiddy', 'emmy',
    ];

    public function run(): void
    {
        $units = Unit::all();

        if ($units->count() < 2) {
            $this->command?->warn('Need at least 2 units in the database to assign distinct officer accounts. Seed units first.');
            return;
        }

        foreach ($this->names as $name) {
            $firstName = ucfirst($name);

            // --- Student account: name@student.com ---
            User::firstOrCreate(
                ['email' => "{$name}@student.com"],
                [
                    'first_name' => $firstName,
                    'last_name' => 'Student',
                    'password' => Hash::make('password'),
                    'role' => 'student',
                    'status' => 'active',
                    'email_verified_at' => now(),
                ]
            );

            // --- Two officer accounts, each tied to a different random unit ---
            $randomUnits = $units->random(2);

            foreach ($randomUnits as $unit) {
                $unitSlug = Str::slug($unit->name);

                User::firstOrCreate(
                    ['email' => "{$name}@{$unitSlug}.com"],
                    [
                        'first_name' => $firstName,
                        'last_name' => 'Officer',
                        'password' => Hash::make('password'),
                        'role' => 'officer',
                        'unit_id' => $unit->id,
                        'status' => 'active',
                        'email_verified_at' => now(),
                    ]
                );
            }

            // --- Admin account, only for the specified names ---
            if (in_array($name, $this->adminNames, true)) {
                User::firstOrCreate(
                    ['email' => "{$name}@admin.com"],
                    [
                        'first_name' => $firstName,
                        'last_name' => 'Admin',
                        'password' => Hash::make('password'),
                        'role' => 'admin',
                        'status' => 'active',
                        'email_verified_at' => now(),
                    ]
                );
            }
        }
    }
}
