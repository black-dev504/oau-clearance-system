<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class FacultiesTable extends Component
{
    public ?string $name;
    public ?string $code;
    public ?string $dean;
    public ?string $accent = '';
    public ?bool $editing = false;
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
