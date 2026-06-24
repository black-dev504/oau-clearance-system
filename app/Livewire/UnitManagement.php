<?php

namespace App\Livewire;

use App\Models\Unit;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UnitManagement extends Component
{

    public ?bool $editing = false;
    public ?string $unitName;
    public ?string $unitCode;
    public ?string $unitType;


    public function addUnit()
    {
        $validated = $this->validate(
            [
                'unitName' => 'required|string',
                'unitCode' => 'required|string|max:3|unique:units,code',
                'unitType' => [
                    'required',
                    Rule::in(array_column(config('units.types'), 'label'))
                ],
            ]
        );

        $unit = Unit::create($validated);

        $this->dispatch('notification', [
            'type' => 'success',
            'message' => 'Unit added successfully'
        ]);

    }




    public function render()
    {
        $units = Unit::all();
        return view('livewire.app.admin.unit-management', ['unitData' => $units]);
    }
}
