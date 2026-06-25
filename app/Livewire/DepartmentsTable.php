<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class DepartmentsTable extends Component
{

    public ?string $name;
    public ?string $code;
    public ?string $hod;
    public $faculties = [];
    public ?string $faculty_id = null;
    public ?bool $editing = false;


    public function addDepartment()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:4|unique:departments,code',
            'hod' => 'required|string|unique:faculties,dean',
            'faculty_id' => 'required|integer|exists:faculties,id'
        ]);

        DB::transaction(function () use ($validated) {
            $department = Department::create(
                [
                    ...$validated,
                    'status' => 'active'

                ]);

            $unit = Unit::create([
                'name' => $department->name,
                'slug' => Str::slug($department->name),
                'type' => 'department',
                'code' => $department->code,
            ]);

            $department->update(['unit_id' => $unit->id]);
        });

        $this->js('$flux.modal("add-department").close()');

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Department added successfully'
        ]);

    }
    public function render()
    {
        $departments = Department::all();
        $this->faculties = Faculty::all();
        return view('livewire.departments-table',
         [
             'departments' => $departments,
             'faculties' => $this->faculties
         ]
        );
    }
}
