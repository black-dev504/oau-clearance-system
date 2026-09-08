<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DepartmentsTable extends Component
{

    public ?string $name;
    public ?string $code;
    public ?string $hod;
    public $faculties = [];
    public ?string $faculty_id = null;
    public ?bool $editing = false;
    public $selectedDepartment;
    public ?string $search = null;
    public ?int $deleteId = null;


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
                'order' => config('units.types')['department']['order'],
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

    public function deleteDepartment()
    {
        $department = Department::findOrFail($this->deleteId);
        $department->delete();
        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Department deleted successfully'
        ]);

        $this->js('$flux.modal("delete-department").close();');
    }

    public function openEditMode($id)
    {
        $this->selectedDepartment = Department::findOrFail($id);
        $this->editing = true;
        $this->name =$this->selectedDepartment->name;
        $this->code =$this->selectedDepartment->code;
        $this->hod =$this->selectedDepartment->hod;
        $this->faculty_id = $this->selectedDepartment->faculty_id;

        $this->dispatch('modal-show', name: 'add-department');
    }

    public function updateDepartment()
    {
        $department = Department::findOrFail($this->selectedDepartment->id);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                'string',
                'max:4',
                Rule::unique('departments', 'code')->ignore($department->id),
            ],

            'hod' => [
                'required',
                'string',
                Rule::unique('departments', 'hod')->ignore($department->id),
            ],
            'faculty_id' => 'required|integer|exists:faculties,id'
        ]);

        DB::transaction(function () use ($validated, $department) {
                $department->update($validated);

                if ($department->wasChanged(['name', 'code'])) {
                    Unit::where('id', $department->unit_id)->update([
                        'name' => $department->name,
                        'slug' => Str::slug($department->name),
                        'code' => $department->code,
                    ]);
                }

        });

        $this->js('$flux.modal("add-department").close()');

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Department updated successfully'
        ]);
    }

    public function resetModal()
    {
        $this->selectedDepartment = null;
        $this->editing = false;
        $this->name = null;
        $this->code = null;
        $this->hod = null;
        $this->faculty_id = null;
    }

    public function getDepartmentsProperty()
    {
        $query = Department::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%')
                ->orWhere('hod', 'like', '%' . $this->search . '%');
        }

        return $query;
    }

    public function render()
    {
        $this->faculties = Faculty::all();
        return view('livewire.departments-table',
         [
             'departments' => $this->departments->latest()->paginate(10),
             'faculties' => $this->faculties
         ]
        );
    }
}
