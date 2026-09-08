<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class FacultiesTable extends Component
{
    public ?string $name;
    public ?string $code;
    public ?string $dean;
    public ?string $accent = '';
    public ?bool $editing = false;
    public $selectedFaculty;
    public ?int $deleteId = null;
    public ?string $search = '';


    public function addFaculty()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:4|unique:faculties,code',
            'dean' => 'required|string|unique:faculties,dean',
            'accent' => ['required', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            ]);

        DB::transaction(function () use ($validated) {
            $faculty = Faculty::create(
                [
                    ...$validated,
                    'status' => 'active'

                ]);

            $unit = Unit::create([
                'name' => $faculty->name,
                'slug' => Str::slug($faculty->name),
                'type' => 'faculty',
                'order' => config('units.types')['faculty']['order'],
                'code' => $faculty->code,
        ]);

            $faculty->update(['unit_id' => $unit->id]);
        });

        $this->js('$flux.modal("add-faculty").close()');

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Faculty added successfully'
        ]);



    }

    public function openEditMode($id)
    {
        $this->selectedFaculty = Faculty::findOrFail($id);
        $this->editing = true;
        $this->name =$this->selectedFaculty->name;
        $this->code =$this->selectedFaculty->code;
        $this->dean =$this->selectedFaculty->dean;



        $this->dispatch('modal-show', name: 'add-faculty');
    }

    public function updateFaculty()
    {
        $faculty = Faculty::findOrFail($this->selectedFaculty->id);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => [
                'required',
                'string',
                'max:4',
                Rule::unique('faculties', 'code')->ignore($faculty->id),
            ],
            'dean' => [
                'required',
                'string',
                Rule::unique('faculties', 'dean')->ignore($faculty->id),
            ],
            'accent' => [ 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        DB::transaction(function () use ($faculty, $validated) {
            $faculty->update($validated);

            if ($faculty->wasChanged(['name', 'code'])) {
                Unit::where('id', $faculty->unit_id)->update([
                    'name' => $faculty->name,
                    'slug' => Str::slug($faculty->name),
                    'code' => $faculty->code,
                ]);
            }
        });

        $this->js('$flux.modal("add-faculty").close()');

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Faculty updated successfully'
        ]);

        $this->editing = false;
        $this->selectedFaculty = null;
    }

    public function deleteFaculty()
    {
        $faculty = Faculty::findOrFail($this->deleteId);
        $faculty->delete();

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Faculty deleted successfully'
        ]);

        $this->js('$flux.modal("delete-faculty").close()');
    }

    public function resetModal()
    {
        $this->selectedFaculty = null;
        $this->editing = false;
        $this->name = null;
        $this->code = null;
        $this->dean  = null;
        $this->accent = null
    ;}


    public function getFacultiesProperty()
    {
        $query = Faculty::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%')
                    ->orWhere('dean', 'like', '%' . $this->search . '%');
        }

        return $query;
    }
    public function render()
    {
        $data = $this->faculties->paginate();
        return view('livewire.faculties-table',
            [
                'faculties' => $data
            ]
        );
    }
}
