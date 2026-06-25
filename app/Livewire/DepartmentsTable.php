<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Faculty;
use Livewire\Component;

class DepartmentsTable extends Component
{


    public function render()
    {
        $departments = Department::all();
        return view('livewire.departments-table',
         [
             'departments' => $departments,
             'faculties' => Faculty::all()
         ]
        );
    }
}
