<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UnitManagement extends Component
{

    public ?bool $editing = false;
    public ?string $name;
    public ?string $code;
    public ?string $type;
    public string $activeView = 'units';

    public function setView(string $view)
    {
        $this->activeView = $view;
    }





    public function render()
    {
        return view('livewire.app.admin.unit-management');
    }
}
