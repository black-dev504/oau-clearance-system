<?php

namespace App\Livewire;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UnitsTable extends Component
{

    public ?bool $editing = false;


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
                'status' => 'active'
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

    public function render()
    {
        $units = Unit::all();
        return view('livewire.units-table', [
            'unitData' => $units
        ]);
    }
}
