<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hostel;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UnitManagement extends Component
{

    public ?bool $editing = false;

    public string $activeTable = 'units';

    public function setTable(string $view)
    {
        $this->activeTable = $view;
    }





    public function render()
    {
        return view('livewire.app.admin.unit-management',
        [
            'unitCount' => Unit::count(),
            'hostelCount' => Unit::where('type', 'hostel')->count(),
            'departmentCount' => Unit::where('type', 'department')->count(),
            'facultyCount' => Unit::where('type', 'faculty')->count(),
            'officerCount' => User::where('role', 'officer')->count()
        ]
        );
    }
}
