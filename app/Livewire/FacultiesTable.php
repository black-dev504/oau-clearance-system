<?php

namespace App\Livewire;

use App\Models\Faculty;
use Livewire\Component;

class FacultiesTable extends Component
{
    public function render()
    {
        $data = Faculty::all();
        return view('livewire.faculties-table',
            [
                'faculties' => $data
            ]
        );
    }
}
