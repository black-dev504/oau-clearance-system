<?php

namespace App\Livewire;

use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UnitsTable extends Component
{

    public ?bool $editing = false;
    public  $selectedUnit;
    public ?string $search = null;
    public ?int $deleteId = null;
    public ?string $name;
    public ?string $code;
    public ?string $type;


    public function addUnit()
    {
        try {
            $validated = $this->validate(
                [
                    'name' => 'required|string',
                    'code' => 'required|string|max:4|unique:units,code',
                    'type' => [
                        'required',
                        Rule::in(array_column(config('units.types'), 'label'))
                    ],
                ]
            );

            $unit = Unit::create([
                ...$validated,
                'slug' => Str::slug($this->name),
                'status' => 'active',
                'order' => config('units.types')[strtolower($this->type)]['order']
            ]);

            $this->js('$flux.modal("add-unit").close()');

            $this->dispatch('notification', [
                'type' => 'success',
                'message' => 'Unit added successfully'
            ]);

        } catch (\Throwable $e)
        {
            $this->js('$flux.modal("add-unit").close()');

            $this->dispatch('notification', [
                'type' => 'error',
                'message' => $e->getMessage()
            ]);
        }

    }

    public function deleteUnit()
    {
        $unit = Unit::findOrFail($this->deleteId);
        $unit->delete();

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Unit deleted successfully'
        ]);

        $this->js('$flux.modal("delete-unit").close()');
    }

    public function openEditMode($id)
    {
        $this->selectedUnit = Unit::findOrFail($id);
        $this->editing = true;
        $this->name = $this->selectedUnit->name;
        $this->code = $this->selectedUnit->code;
        $this->type = $this->selectedUnit->type;

        $this->dispatch('modal-show', name: 'add-unit');
    }

    public function updateUnit()
    {
        $unit = Unit::findOrFail($this->selectedUnit->id);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:4|unique:faculties,code,' . $unit->id,
            'type' => 'required|string',
        ]);

        $unit->update($validated);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Unit updated successfully'
        ]);

        $this->js('$flux.modal("add-unit").close()');

        $this->editing = false;
        $this->selectedUnit = null;
    }

    public function resetModal()
    {
        $this->selectedUnit = null;
        $this->editing = false;
        $this->name = null;
        $this->code = null;
        $this->type = null;
    }

    public function getUnitsProperty()
    {
        $query = Unit::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('code', 'like', '%' . $this->search . '%');
        }

        return $query;
    }

    public function render()
    {
        $units = $this->units->paginate();
        return view('livewire.units-table', [
            'unitData' => $units
        ]);
    }
}
