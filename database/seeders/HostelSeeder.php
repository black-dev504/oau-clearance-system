<?php

namespace Database\Seeders;

use App\Models\Hostel;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HostelSeeder extends Seeder
{
    /**
     * OAU's actual undergraduate halls of residence.
     * Note: Muritala Muhammad Hall (the postgraduate hall) is mixed-gender
     * and is intentionally omitted here since the schema's `gender` enum
     * only supports 'male' or 'female'. Add it separately if you extend
     * the enum to support a mixed/unisex option.
     */
    protected array $hostels = [
        ['name' => 'Angola Hall', 'code' => 'ANG', 'gender' => 'male', 'warden' => 'Dr. Adebayo Ogundele'],
        ['name' => 'Awolowo Hall', 'code' => 'AWO', 'gender' => 'male', 'warden' => 'Dr. Kunle Adewale'],
        ['name' => 'ETF Hall', 'code' => 'ETF', 'gender' => 'male', 'warden' => 'Dr. Tunde Bakare'],
        ['name' => 'Fajuyi Hall', 'code' => 'FAJ', 'gender' => 'male', 'warden' => 'Dr. Emeka Nwosu'],
        ['name' => 'Akintola Hall', 'code' => 'AKN', 'gender' => 'female', 'warden' => 'Dr. Folake Adeyemi'],
        ['name' => 'Alumni Hall', 'code' => 'ALM', 'gender' => 'female', 'warden' => 'Dr. Ngozi Okafor'],
        ['name' => 'Moremi Hall', 'code' => 'MOR', 'gender' => 'female', 'warden' => 'Dr. Bisi Ajayi'],
        ['name' => 'Mozambique Hall', 'code' => 'MOZ', 'gender' => 'female', 'warden' => 'Dr. Chioma Eze'],
    ];

    public function run(): void
    {

        foreach ($this->hostels as $index => $data) {
            $slug = Str::slug($data['name']);

            $unit = Unit::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'order' => 3,
                    'type' => 'hostel',
                    'gender' => $data['gender'],
                    'status' => 'active',
                    'accent' => '#374151',
                    'code' => $data['code'],
                ]
            );

            Hostel::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'unit_id' => $unit->id,
                    'code' => $data['code'],
                    'gender' => $data['gender'],
                    'warden' => $data['warden'],
                    'status' => 'active',
                ]
            );
        }
    }
}
