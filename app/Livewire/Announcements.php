<?php

namespace App\Livewire;

use Livewire\Component;

class Announcements extends Component
{


    public function render()
    {
        return view('livewire.app.officer.announcements',
            [
                'announcements' => auth()->user()->unit->announcements()->latest()->get(),
            ]
        );
    }
}
