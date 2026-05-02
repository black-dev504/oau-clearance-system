<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Student extends Component
{

    public $registered = false;


    public function openModal(): void
    {
        $this->dispatch('open-clearance-modal');
    }


    #[On('form-submitted')]
    public function submitted()
    {
        $this->registered = true;

    }

    public function render()
    {
        return view('livewire.app.student')
            ->layout('layouts.student', ['user' => auth()->user()]);
    }
}
